<?php

namespace App\Http\Controllers\Pos;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Pembayaran;
use App\Models\MasterBrand;
use App\Models\MasterProduk;
use App\Models\Mastersatuan;
use Illuminate\Http\Request;
use App\Models\MasterSupplier;
use App\Models\MasterPelanggan;
use App\Http\Controllers\Controller;
use App\Models\MasterBank;
use App\Models\MasterJenisTransaksi;
use App\Models\MasterKategori;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class MasterController extends Controller
{

    public function logout(Request $request)
    {

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Logout berhasil!');
    }

    // New MasterKategori Controller
    public function index_kategori(Request $request)
    {
        $data = MasterKategori::query();
        if ($request->ajax()) {

            // Apply custom filter if provided
            if ($request->customFilter) {
                $data->where(function($query) use ($request) {
                    $query->where('nama', 'like', '%' . $request->customFilter . '%');
                });
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend1.master.kategori.index', compact('data'));
    }

    public function store_kategori(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        MasterKategori::create([
            'nama' => $request->nama,
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('index.kategori')->with('success', 'Kategori berhasil ditambahkan!');
    }


    public function update_kategori(Request $request, $id)
    {
        $data = MasterKategori::findOrFail($id);
        $data->update([
            'nama' => $request->nama,
            ]);
        return redirect()->route('index.barang');
    }

    public function delete_barang($id)
    {
        MasterKategori::find($id)->delete();
        return redirect()->back()->with('success', 'Kategori berhasil diupdate!');
    }

    // new pembayaran controller
    public function index_pembayaran(Request $request)
    {
        $data = MasterBank::query();
        if ($request->ajax()) {

            // Apply custom filter if provided
            if ($request->customFilter) {
                $data->where(function($query) use ($request) {
                    $query->where('nama', 'like', '%' . $request->customFilter . '%');
                    $query->orWhere('nama_pemilik', 'like', '%' . $request->customFilter . '%');
                });
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend1.master.bank.index', compact('data'));
    }

    public function store_pembayaran(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nama_pemilik' => 'required|string|max:255',

        ]);

        MasterBank::create([
            'nama' => $request->nama,
            'nama_pemilik' => $request->nama_pemilik,
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('index.pembayaran')->with('success', 'Pembayaran berhasil ditambahkan!');
    }

    public function update_pembayaran(Request $request, $id)
    {
        $data = MasterBank::findOrFail($id);
        $data->update([
            'nama' => $request->nama,
            'nama_pemilik' => $request->nama_pemilik,
            ]);
        return redirect()->route('index.pembayaran')->with('success', 'Pembayaran berhasil diupdate!');
    }

    public function delete_pembayaran($id)
    {
        MasterBank::find($id)->delete();
        return redirect()->back()->with('success', 'Pembayaran berhasil dihapus!');
    }

    // New Supplier Controller
    public function index_supplier(Request $request)
    {
        $data = MasterSupplier::query();
        if ($request->ajax()) {

            // Apply custom filter if provided
            if ($request->customFilter) {
                $data->where(function($query) use ($request) {
                    $query->where('nama', 'like', '%' . $request->customFilter . '%');
                });
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend1.master.supplier.index', compact('data'));
    }

    public function store_supplier(Request $request)
    {
        $request->validate([
            'nama' => 'nullable|string|max:255',
            'no_hp' => 'nullable|',
            'vendor' => 'nullable|',
        ]);

        MasterSupplier::create([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'vendor' => $request->vendor,
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('index.supplier')->with('success', 'Supplier berhasil ditambahkan!');
    }

    public function update_supplier(Request $request, $id)
    {
        $data = MasterSupplier::findOrFail($id);
        $data->update([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'vendor' => $request->vendor,
            'updated_by' => Auth::user()->id,
            ]);
        return redirect()->route('index.supplier')->with('success', 'Supplier berhasil diupdate!');
    }

    public function delete_supplier($id)
    {
        MasterSupplier::find($id)->delete();
        return redirect()->back()->with('success', 'Supplier berhasil dihapus!');
    }

    // New Brand Controller
    public function index_brand(Request $request)
    {
        $data = MasterBrand::query();
        if ($request->ajax()) {

            // Apply custom filter if provided
            if ($request->customFilter) {
                $data->where(function($query) use ($request) {
                    $query->where('nama', 'like', '%' . $request->customFilter . '%');
                });
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend1.master.brand.index', compact('data'));
    }

    public function store_brand(Request $request)
    {
        $request->validate([
            'nama' => 'nullable|string|max:255',
        ]);

        MasterBrand::create([
            'nama' => $request->nama,
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('index.brand')->with('success', 'Brand berhasil ditambahkan!');
    }

    public function update_brand(Request $request, $id)
    {
        $data = MasterBrand::findOrFail($id);
        $data->update([
            'nama' => $request->nama,
            'updated_by' => Auth::user()->id,
            ]);
        return redirect()->route('index.brand')->with('success', 'Brand berhasil diupdate!');
    }

    public function delete_brand($id)
    {
        MasterBrand::find($id)->delete();
        return redirect()->back()->with('success', 'Brand berhasil dihapus!');
    }

    // New Satuan Controller
    public function index_satuan(Request $request)
    {
        $data = MasterSatuan::query();
        if ($request->ajax()) {

            // Apply custom filter if provided
            if ($request->customFilter) {
                $data->where(function($query) use ($request) {
                    $query->where('nama', 'like', '%' . $request->customFilter . '%');
                });
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend1.master.satuan.index', compact('data'));
    }

    public function store_satuan(Request $request)
    {
        $request->validate([
            'nama' => 'nullable|string|max:255',
        ]);

        MasterSatuan::create([
            'nama' => $request->nama,
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('index.satuan')->with('success', 'Satuan berhasil ditambahkan!');
    }

    public function update_satuan(Request $request, $id)
    {
        $data = MasterSatuan::findOrFail($id);
        $data->update([
            'nama' => $request->nama,
            'updated_by' => Auth::user()->id,
            ]);
        return redirect()->route('index.satuan')->with('success', 'Satuan berhasil diupdate!');
    }

    public function delete_satuan($id)
    {
        MasterSatuan::find($id)->delete();
        return redirect()->back()->with('success', 'Satuan berhasil dihapus!');
    }

     // New pelanggan Controller
    public function index_pelanggan(Request $request)
    {
        $data = MasterPelanggan::query();
        if ($request->ajax()) {

             // Apply custom filter if provided
            if ($request->customFilter) {
                $data->where(function($query) use ($request) {
                    $query->where('nama', 'like', '%' . $request->customFilter . '%');
                });
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend1.master.pelanggan.index', compact('data'));
    }

    public function store_pelanggan(Request $request)
    {
        $request->validate([
            'nama' => 'nullable|string|max:255',
        ]);

        MasterPelanggan::create([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('index.pelanggan')->with('success', 'Pelanggan berhasil ditambahkan!');
    }

    public function update_pelanggan(Request $request, $id)
    {
        $data = MasterPelanggan::findOrFail($id);
        $data->update([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'updated_by' => Auth::user()->id,
            ]);
        return redirect()->route('index.pelanggan')->with('success', 'Pelanggan berhasil diupdate!');
    }

    public function delete_pelanggan($id)
    {
        MasterPelanggan::find($id)->delete();
        return redirect()->back()->with('success', 'Pelanggan berhasil dihapus!');
    }

    // New produk Controller
    public function index_produk(Request $request)
    {
        $data = MasterProduk::query()
                ->with(['kategori' , 'satuan']);
        if ($request->ajax()) {

             // Apply custom filter if provided
            if ($request->customFilter) {
                $data->where(function($query) use ($request) {
                    $query->where('nama', 'like', '%' . $request->customFilter . '%')
                    ->orWhere('stock', 'like', '%' . $request->customFilter . '%')
                    ->orWhere('harga_jual', 'like', '%' . $request->customFilter . '%');
                });
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('kategori', function ($row) {
                    return $row->kategori->nama ?? '';
                })
                ->addColumn('action', function ($row) {
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $kategori = MasterKategori::all();
        $satuan = Mastersatuan::all();
        return view('backend1.master.produk.index', compact('data','kategori','satuan'));
    }

    public function store_produk(Request $request)
    {
        $request->validate([
            'nama' => 'nullable|string|max:255',
        ]);

        // Jika kategori_id bukan angka, buat kategori baru
        if (!is_numeric($request->kategori_id)) {
            $kategoriBaru = MasterKategori::create([
                'nama' => $request->kategori_id,
                'created_by' => Auth::id(),
            ]);
            $kategori_id = $kategoriBaru->id;
        } else {
            $kategori_id = $request->kategori_id;
        }

        $hargaJual = str_replace('.', '', $request->harga_jual);
        MasterProduk::create([
            'nama' => $request->nama,
            'kategori_id' => $kategori_id,
            'satuan_id' => $request->satuan_id,
            'qty' => $request->qty,
            'harga_jual' => (int) $hargaJual,
            'created_by' => Auth::id(),
        ]);
        return redirect()->route('index.produk')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function update_produk(Request $request, $id)
    {
        $data = MasterProduk::findOrFail($id);
        $hargaJual = str_replace('.', '', $request->harga_jual);
        $data->update([
            'nama' => $request->nama,
            'kategori_id' => $request->kategori_id,
            'satuan_id' => $request->satuan_id,
            // 'stock' => $request->stock,
            'harga_jual' => (int) $hargaJual,
            'created_by' => Auth::id(),
            'updated_by' => Auth::user()->id,
            ]);
        return redirect()->route('index.produk')->with('success', 'Produk berhasil diupdate!');
    }

    public function delete_produk($id)
    {
        try {
            $produk = MasterProduk::findOrFail($id); // lebih aman, akan throw jika tidak ditemukan
            $produk->delete();

            return redirect()->back()->with('success', 'Produk berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus produk: ' . $e->getMessage());
        }
    }

    // New produk Controller
    public function index_jenis_transaksi(Request $request)
    {
        $data = MasterJenisTransaksi::query()->with('kategori');
        if ($request->ajax()) {

             // Apply custom filter if provided
            if ($request->customFilter) {
                $data->where(function($query) use ($request) {
                    $query->where('nama', 'like', '%' . $request->customFilter . '%')
                    ->orWhere('tipe', 'like', '%' . $request->customFilter . '%')
                    ->orWhere('keterangan', 'like', '%' . $request->customFilter . '%');
                });
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('kategori', function ($row) {
                    return $row->kategori->nama ?? '';
                })
                ->addColumn('action', function ($row) {
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $kategori = MasterKategori::all();
        return view('backend1.master.jenisTransaksi.index', compact('data','kategori'));
    }

    public function store_jenis_transaksi(Request $request)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'kategori_id' => 'nullable|string|max:255',
                'nama' => 'nullable|string|max:255',
                'tipe' => 'nullable|string|max:255',
                'keterangan' => 'nullable|string|max:255',
            ]);

            // Simpan ke database
            MasterJenisTransaksi::create([
                'nama' => $validated['nama'],
                'kategori_id' => $validated['kategori_id'],
                'tipe' => $validated['tipe'],
                'keterangan' => $validated['keterangan'],
                'created_by' => Auth::id(),
            ]);

            return redirect()->route('index.jenis_transaksi')->with('success', 'Jenis Transaksi berhasil ditambahkan!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Jika validasi gagal
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            // Jika terjadi error lain saat menyimpan
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage())->withInput();
        }
    }

    public function update_jenis_transaksi(Request $request, $id)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'kategori_id' => 'nullable|string|max:255',
                'nama' => 'nullable|string|max:255',
                'tipe' => 'nullable|string|max:255',
                'keterangan' => 'nullable|string|max:255',
            ]);

            $data = MasterJenisTransaksi::findOrFail($id);
            $data->update([
                'nama' => $validated['nama'],
                'kategori_id' => $validated['kategori_id'],
                'tipe' => $validated['tipe'],
                'keterangan' => $validated['keterangan'],
                'updated_by' => Auth::user()->id,
                ]);
            return redirect()->route('index.jenis_transaksi');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Jika validasi gagal
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            // Jika terjadi error lain saat menyimpan
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage())->withInput();
        }

    }

    public function delete_jenis_transaksi($id)
    {
        MasterJenisTransaksi::find($id)->delete();
        return redirect()->back()->with('success', 'Jenis Transaksi berhasil dihapus!');
    }
}
