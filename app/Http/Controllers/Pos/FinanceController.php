<?php

namespace App\Http\Controllers\Pos;

use App\Models\MasterBank;
use App\Models\MasterProduk;
use Illuminate\Http\Request;
use App\Models\MasterKategori;
use App\Models\MasterSupplier;
use App\Models\MasterPelanggan;
use App\Models\finance_pembelian;
use App\Models\finance_penjualan;
use App\Models\finance_penjualan_detail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\MasterJenisTransaksi;
use App\Models\finance_pembelian_detail;
use Yajra\DataTables\Facades\DataTables;

class FinanceController extends Controller
{
    public function index_pembelian(Request $request)
    {
        if ($request->ajax()) {
            $query = finance_pembelian::with(['finance_pembelian_detail', 'MasterSupplier', 'MasterBank'])
                ->latest();

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('qty', function ($row) {
                    return $row->finance_pembelian_detail->sum('qty') ?: '-';
                })
                ->addColumn('supplier', function ($row) {
                    return $row->MasterSupplier->nama ?? '-';
                })
                ->addColumn('vendor', function ($row) {
                    return $row->MasterSupplier->vendor ?? '-';
                })
                ->addColumn('total', function ($row) {
                    return $row->total ?? '-';
                })
                ->addColumn('action', function ($row) {
                    return '<a href="#" onclick="openEditModal(' . $row->id . ')" class="btn btn-warning btn-sm">Edit</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend1.finance.pembelian.index', []);
    }

    public function add_pembelian()
    {
        $supplier = MasterSupplier::all();
        $kategori = MasterKategori::all();
        $produk = MasterProduk::all();
        $pembayaran = MasterBank::all();
        return view('backend1.finance.pembelian.add_pembelian', [
            'supplier' => $supplier,
            'kategori' => $kategori,
            'produk' => $produk,
            'pembayaran' => $pembayaran,
        ]);
    }

    public function store_pembelian(Request $request)
    {
        DB::beginTransaction();
        try {
            $date = now()->format('Ymd');

            // ===== GENERATE ID UNTUK HEADER =====
            $lastId = finance_pembelian::where('id', 'LIKE', 'PB%')->orderBy('id', 'desc')->value('id');

            if ($lastId) {
                $lastCounter = (int) substr($lastId, -4);
                $counter = $lastCounter + 1;
            } else {
                $counter = 1;
            }

            $finId = "PB{$date}" . str_pad($counter, 4, '0', STR_PAD_LEFT);

            // ===== SIMPAN KE TABLE HEADER =====
            $pembelian = finance_pembelian::create([
                'id' => $finId,
                'supplier_id' => $request->supplier_id,
                'pembayaran_id' => $request->pembayaran_id,
                'tanggal' => $request->tanggal,
                'created_by' => auth()->user()->id,
                'subtotal' => array_sum(array_map(fn($b) => (float) str_replace('.', '', $b), $request->total))
            ]);

            // ===== GENERATE DAN SIMPAN DETAIL =====
            $detailData = [];

            // Ambil jumlah baris hari ini yang sudah ada
            $countToday = DB::table('finance_pembelian_detail')
                ->where('id', 'LIKE', "PBD{$date}%")
                ->count();

            // Mulai counter dari jumlah hari ini + 1
            $counterDetail = $countToday + 1;

            foreach ($request->kategori_id as $index => $kategoriId) {
                $detailId = "PBD{$date}" . str_pad($counterDetail, 4, '0', STR_PAD_LEFT);

                $harga_beli = floatval(str_replace(['.', ','], '', $request->harga_beli[$index] ?? 0));
                $qty = intval($request->qty[$index] ?? 1);
                $total = $harga_beli * $qty;

                $detailData[] = [
                    'id' => $detailId,
                    'pembelian_id' => $finId,
                    'produk_id' => $kategoriId,
                    'harga_beli' => $harga_beli,
                    'keterangan' => $request->keterangan[$index] ?? '',
                    'qty' => $qty,
                    'total' => $total,
                    'created_by' => auth()->user()->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ];

                $counterDetail++;
            }

            if (count($detailData) > 0) {
                // Simpan detail
                finance_pembelian_detail::insert($detailData);

                // Tambahkan stok dan update harga ke produk
                foreach ($detailData as $detail) {
                    DB::table('master_produk')
                        ->where('id', $detail['produk_id']) // atau ganti ke produk_id jika perlu
                        ->increment('qty', $detail['qty']);

                    DB::table('master_produk')
                        ->where('id', $detail['produk_id'])
                        ->update(['harga_beli_terakhir' => $detail['harga_beli']]);
                }
            }

            DB::commit();
            return redirect()->route('finance.index')->with('success', 'Data Pembelian Berhasil Ditambahkan');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error storing pembelian: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data pembelian.');
        }
    }

    public function edit_pembelian($id)
    {
        // Cek apakah user punya permission 'edit finance'
        if (!auth()->user()->can('finance.edit')) {
            abort(403, 'Anda tidak memiliki akses untuk mengedit data finance ini.');
        }

        // $pembelian = finance_pembelian::with(['finance_pembelian_detail'])->findOrFail($id);
        $pembelian = finance_pembelian::where('id', $id)
            ->with(['finance_pembelian_detail' => function ($query) {
                $query->select('id', 'pembelian_id', 'kategori_id', 'harga', 'qty', 'total','keterangan');
            }])
            ->first();
        if (!$pembelian) {
            return redirect()->route('finance.index')->with('error', 'Data tidak ditemukan.');
        }

        $supplier = MasterSupplier::all();
        $produk = MasterProduk::all();
        $pembayaran = MasterBank::all();

        return view('backend1.finance.pembelian.edit_pembelian', [
            'pembelian' => $pembelian,
            'supplier' => $supplier,
            'produk' => $produk,
            'pembayaran' => $pembayaran,
        ]);
    }

    public function update_pembelian(Request $request, $id)
    {
        try {
            $detail = finance_pembelian_detail::findOrFail($id);

            // Pastikan jika field biaya, ubah ke format angka
            $value = $request->value;
            if ($request->field === "harga") {
                $value = str_replace('.', '', $value); // Hapus titik ribuan
                $value = floatval($value); // Ubah ke angka
            }

            // Hitung total baru jika field yang diubah adalah qty atau biaya
            if ($request->field === "qty" || $request->field === "harga") {
                $qty = ($request->field === "qty") ? intval($value) : $detail->qty;
                $harga = ($request->field === "harga") ? floatval($value) : floatval($detail->harga);
                $total = $qty * $harga;

                // Update qty, biaya, dan total di database
                $detail->update([
                    $request->field => $value,
                    'total' => $total,
                ]);
            } else {
                // Update hanya field yang diubah
                $detail->update([
                    $request->field => $value
                ]);
            }

            return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    public function update_subtotal(Request $request, $id)
    {
        Log::info("Menerima ID: " . $id);

        // Debugging: Periksa semua data di tabel
        $allData = finance_pembelian::pluck('id')->toArray();
        Log::info("Semua ID di database: " . json_encode($allData));

        $pengeluaran = finance_pembelian::where('id', $id)->first();

        if (!$pengeluaran) {
            Log::error("ID tidak ditemukan: " . $id);
            return response()->json(["success" => false, "message" => "ID tidak valid"], 400);
        }

        $pengeluaran->subtotal = $request->subtotal;
        $pengeluaran->save();

        return response()->json(["success" => true, "message" => "Subtotal diperbarui"]);
    }

    public function delete_pembelian($id)
    {
        DB::beginTransaction();
        try {
            // Cek apakah data pengeluaran ada
            $pengeluaran = finance_pembelian::find($id);
            if (!$pengeluaran) {
                return response()->json(['message' => 'Data tidak ditemukan'], 404);
            }

            // Ambil semua detail pembelian
            $details = finance_pembelian_detail::where('pembelian_id', $id)->get();

            foreach ($details as $detail) {
                // Kurangi stok di tabel master_produk
                DB::table('master_produk')
                    ->where('id', $detail->kategori_id)
                    ->decrement('qty', $detail->qty);
            }

            // Hapus detail pengeluaran terlebih dahulu
            finance_pembelian_detail::where('pembelian_id', $id)->delete();

            // Hapus data utama dari finance_pengeluaran
            $pengeluaran->delete();

            DB::commit();
            return response()->json(['message' => 'Data berhasil dihapus'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Terjadi kesalahan', 'error' => $e->getMessage()], 500);
        }
    }

    // Modul Penjualan
    public function index_penjualan(Request $request)
    {
        if ($request->ajax()) {
            $query = finance_penjualan::with(['finance_penjualan_detail', 'MasterPelanggan', 'MasterBank','MasterJenisTransaksi'])
                ->latest();

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('pelanggan', function ($row) {
                    return $row->MasterPelanggan->nama ?? '-';
                })
                ->addColumn('harga', function ($row) {
                    return $row->finance_penjualan_detail->first()->harga ?? '-';
                })
                ->addColumn('nominal', function ($row) {
                    return $row->finance_penjualan_detail->first()->nominal ?? '-';
                })
                ->addColumn('profit', function ($row) {
                    return $row->finance_penjualan_detail->first()->profit ?? '-';
                })
                ->addColumn('qty', function ($row) {
                    return $row->finance_penjualan_detail->first()->qty ?? '-';
                })
                ->addColumn('bank', function ($row) {
                    return $row->MasterBank->nama ?? '-';
                })
                ->addColumn('jenis', function ($row) {
                    return $row->MasterJenisTransaksi->nama ?? '-';
                })
                ->addColumn('total', function ($row) {
                    return $row->total ?? '-';
                })
                ->addColumn('action', function ($row) {
                    return '<a href="#" onclick="openEditModal(' . $row->id . ')" class="btn btn-warning btn-sm">Edit</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend1.finance.penjualan.index', []);
    }

    public function add_penjualan()
    {
        $jenis = MasterJenisTransaksi::all();
        $produk = MasterProduk::all();
        $pembayaran = MasterBank::all();
        $penjualan = finance_penjualan_detail::all();
        $pelanggan = MasterPelanggan::all();
        return view('backend1.finance.penjualan.add', [
            'jenis' => $jenis,
            'produk' => $produk,
            'pembayaran' => $pembayaran,
            'penjualan' => $penjualan,
            'pelanggan' => $pelanggan,
        ]);
    }

    public function add_penjualan1()
    {
        $jenis = MasterJenisTransaksi::all();
        $produk = MasterProduk::all();
        $pembayaran = MasterBank::all();
        $penjualan = finance_penjualan_detail::all();
        $pelanggan = MasterPelanggan::all();

        return view('backend1.finance.penjualan.add_penjualan_modified', [
            'jenis' => $jenis,
            'produk' => $produk,
            'pembayaran' => $pembayaran,
            'penjualan' => $penjualan,
            'pelanggan' => $pelanggan,
        ]);

    }

    public function getProdukByJenis($id)
    {
        $jenis = MasterJenisTransaksi::findOrFail($id);

        $produk = MasterProduk::where('kategori_id', $jenis->kategori_id)
            ->select('id', 'nama', 'harga_beli_terakhir','harga_jual')
            ->get();

        return response()->json($produk);
    }

    public function getHargaBeli($id)
    {
        Log::info('Cek produk ID', ['id' => $id]); // 👈 Tambahkan baris ini

        $harga = DB::table('finance_pembelian_detail')
            ->where('produk_id', $id)
            ->orderByDesc('created_at') // atau 'id' jika tidak pakai timestamps
            ->value('harga_beli');

        if ($harga) {
            return response()->json(['harga_beli' => $harga]);
        }

        return response()->json(['harga_beli' => null]);
    }

    private function generateTransaksiId(): string
    {
        $prefix = 'PJ' . date('Ymd');
        $lastId = finance_penjualan::where('id', 'like', $prefix . '%')
            ->orderByDesc('id')
            ->value('id');

        if ($lastId) {
            $lastNumber = (int) substr($lastId, -4);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        return $prefix . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
    }

    private function generateDetailId(): string
    {
        $prefix = 'PJD' . date('Ymd');
        $lastId = finance_penjualan_detail::where('id', 'like', $prefix . '%')
            ->orderByDesc('id')
            ->value('id');

        if ($lastId) {
            $lastNumber = (int) substr($lastId, -4);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        return $prefix . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
    }


    // public function store_penjualan(Request $request)
    // {
    //     dd($request->all());
    //     $request->validate([
    //         'tanggal' => 'nullable|date',
    //         'jenis_transaksi_id.*' => 'nullable',
    //         'nominal.*' => 'nullable|',
    //         'profit.*' => 'nullable|',
    //         'qty.*' => 'nullable|',
    //         'total.*' => 'nullable|',
    //         'keterangan.*' => 'nullable|string',
    //     ]);

    //     DB::beginTransaction();
    //     try {
    //         // Generate ID transaksi utama
    //         $idTransaksi = $this->generateTransaksiId();
    //         $hargaBeli = str_replace('.', '', $request->harga_beli);
    //         $hargaJual = str_replace('.', '', $request->harga_jual);
    //         $pembayaranId = $request->pembayaran_id_else ?? $request->pembayaran_id;
    //         $subtotal = $request->total[0] ?? str_replace('.', '', $request->harga_jual);

    //         $transaksi = finance_penjualan::create([
    //             'id' => $idTransaksi,
    //             // 'jenis_transaksi_id' => $request->jenis_transaksi_id,
    //             'jenis_transaksi_id' => $request->jenis_transaksi_id[0] ?? null,
    //             'pembayaran_id' => $pembayaranId,
    //             'pembayaran_id' => $request->pembayaran_id_else,
    //             'metode_pembayaran' => is_array($request->metode_pembayaran) ? $request->metode_pembayaran[0] ?? null : $request->metode_pembayaran, // tambahkan ini
    //             'subtotal' => $request->total[0] ?? 0,
    //             'subtotal' => $hargaJual,
    //             'tanggal' => $request->tanggal,
    //             'created_by' => auth()->id(),
    //         ]);

    //         // // Simpan detail transaksi
    //         // foreach ($request->jenis_transaksi_id as $i => $jenisId) {
    //         //     $detailId = $this->generateDetailId();

    //         //     finance_penjualan_detail::create([
    //         //         'id' => $detailId,
    //         //         'penjualan_id' => $idTransaksi,
    //         //         'metode_pembayaran' => $request->metode_pembayaran,
    //         //         'harga_beli' => $hargaBeli,
    //         //         'harga_jual' => $hargaJual,
    //         //         'total' => $hargaJual,
    //         //         'produk_id' => $request->produk_id[$i] ?? null,
    //         //         'nominal' => $request->nominal[$i],
    //         //         'profit' => $request->profit[$i],
    //         //         'qty' => $request->qty[$i],

    //         //         'total' => $request->total[$i],
    //         //         'keterangan' => $request->keterangan[$i] ?? '',
    //         //     ]);
    //         // }

    //         foreach ($request->jenis_transaksi_id as $i => $jenisId) {
    //             finance_penjualan_detail::create([
    //                 'id' => $this->generateDetailId(),
    //                 'penjualan_id' => $idTransaksi,
    //                 'harga_beli' => str_replace('.', '', $request->harga_beli[$i] ?? 0),
    //                 'harga_jual' => str_replace('.', '', $request->harga_jual[$i] ?? 0),
    //                 'total' => str_replace('.', '', $request->total[$i] ?? 0),
    //                 'produk_id' => $request->produk_id[$i] ?? null,
    //                 'nominal' => str_replace('.', '', $request->nominal[$i] ?? 0),
    //                 'profit' => str_replace('.', '', $request->profit[$i] ?? 0),
    //                 'qty' => $request->qty[$i] ?? 1,
    //                 'keterangan' => $request->keterangan[$i] ?? '',
    //             ]);
    //         }

    //         DB::commit();
    //         return redirect()->back()->with('success', 'Transaksi berhasil disimpan!');
    //     } catch (\Exception $e) {
    //         DB::rollBack();

    //         // ✅ Log error untuk debugging
    //         Log::error('Gagal menyimpan transaksi penjualan', [
    //             'message' => $e->getMessage(),
    //             'trace' => $e->getTraceAsString(),
    //             'request' => $request->all()
    //         ]);

    //         return redirect()->back()->withErrors(['error' => 'Gagal menyimpan transaksi: ' . $e->getMessage()]);
    //     }
    // }


    public function store_penjualan(Request $request)
{
    // dd($request->all());
    function toInt($value) {
    return (int) str_replace('.', '', $value);
}
    $request->validate([
        'tanggal' => 'nullable|date',
        'jenis_transaksi_id.*' => 'nullable',
        'nominal.*' => 'nullable',
        'profit.*' => 'nullable',
        'qty.*' => 'nullable',
        'total.*' => 'nullable',
        'keterangan.*' => 'nullable|string',
    ]);

    DB::beginTransaction();
    try {
        $idTransaksi = $this->generateTransaksiId();

        // Ambil pembayaran_id yang benar
        $pembayaranId = $request->pembayaran_id_else ?? $request->pembayaran_id;
        $subtotal = toInt($request->harga_jual); // Ambil dari total pertama (kalau hanya satu item)

        // ⬇️ Simpan ke tabel finance_penjualan (HEADER)
        $transaksi = finance_penjualan::create([
            'id' => $idTransaksi,
            'jenis_transaksi_id' => $request->jenis_transaksi_id[0] ?? null,
            'pembayaran_id' => $pembayaranId,
            'subtotal' => $subtotal,
            'tanggal' => $request->tanggal,
            'metode_pembayaran' => $request->metode_pembayaran, // DI SINI tempatnya
            'created_by' => auth()->id(),
        ]);

        // ⬇️ Simpan ke tabel finance_penjualan_detail (DETAIL)
        foreach ($request->jenis_transaksi_id as $i => $jenisId) {
            finance_penjualan_detail::create([
                'id' => $this->generateDetailId(),
                'penjualan_id' => $idTransaksi,

                'produk_id'  => $request->produk_id[$i] ?? null,
                'nominal'    => toInt($request->nominal[$i] ?? 0),
                'profit'     => toInt($request->profit[$i] ?? 0),
                'qty'        => $request->qty[$i] ?? 1,
                'total'      => toInt($request->total[$i] ?? 0),
                'harga_jual' => toInt($request->harga_jual), // Jika hanya 1 item
                'harga_beli' => toInt($request->harga_beli),
                'keterangan' => $request->keterangan[$i] ?? '',
            ]);
        }

        DB::commit();
        return redirect()->back()->with('success', 'Transaksi berhasil disimpan!');
    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Gagal menyimpan transaksi penjualan', [
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
            'request' => $request->all()
        ]);

        return redirect()->back()->withErrors(['error' => 'Gagal menyimpan transaksi: ' . $e->getMessage()]);
    }
}

    public function delete_penjualan($id)
    {
        DB::beginTransaction();
        try {
            // Cek apakah data penjualan ada
            $penjualan = finance_penjualan::find($id);
            if (!$penjualan) {
                return response()->json(['message' => 'Data tidak ditemukan'], 404);
            }

            // Hapus detail penjualan terlebih dahulu
            finance_penjualan_detail::where('penjualan_id', $id)->delete();

            // Hapus data utama dari finance_penjualan
            $penjualan->delete();

            DB::commit();
            return response()->json(['message' => 'Data berhasil dihapus'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Terjadi kesalahan', 'error' => $e->getMessage()], 500);
        }
    }
}
