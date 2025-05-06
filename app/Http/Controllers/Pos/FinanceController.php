<?php

namespace App\Http\Controllers\Pos;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\MasterSupplier;
use App\Models\finance_pembelian;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class FinanceController extends Controller
{
    public function index_pembelian(Request $request)
    {
        if ($request->ajax()) {
            $query = finance_pembelian::with(['finance_pembelian_detail', 'MasterSupplier', 'Pembayaran'])
                ->latest();

            return DataTables::of($query)
                ->addIndexColumn()
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
        $barang = Barang::all();
        return view('backend1.finance.pembelian.add_pembelian', [
            'supplier' => $supplier,
            'barang' => $barang,
        ]);
    }

    public function store_pembelian(Request $request)
    {
        // dd($request->all()); // Debugging awal
        DB::beginTransaction();
        try {
            $date = now()->format('Ymd');

            $lastId = finance_pembelian::where('id', 'LIKE', 'PB%')->orderBy('id', 'desc')->value('id');

            if ($lastId) {
                // Extract the last 4 digits (counter)
                $lastCounter = (int) substr($lastId, -4);
                $counter = $lastCounter + 1;
            } else {
                $counter = 1; // Start from 0001 if no records exist
            }

            // Generate the new ID in format "PGYYYYMMDDXXXX"
            $finId = "PG{$date}" . str_pad($counter, 4, '0', STR_PAD_LEFT);

            // Simpan ke table finance_pengeluaran
            $pembelian = finance_pembelian::create([
                'id' => $finId,
                'supplier_id' => $request->supplier_id,
                'tanggal' => $request->tanggal,
                // 'vendor_id' => $request->vendor_id,
                // 'subtotal' => array_sum($request->biaya) // Total biaya dari array
                'created_by' => auth()->user()->id,
                'total' => array_sum(array_map(fn($b) => (float) str_replace('.', '', $b), $request->total))
            ]);

            $detailData = [];
            $lastDetailId = DB::table('finance_pembelian_detail')->where('id', 'LIKE', "PB{$date}%")->max('id');

            // Jika ada ID sebelumnya, ambil angka terakhirnya, jika tidak mulai dari 1
            $counterDetail = $lastDetailId ? (int) substr($lastDetailId, -4) + 1 : 1;

            if (is_array($request->barang_id)) {
                foreach ($request->barang_id as $index => $barangId) {
                    //Buat ID baru yang unik untuk setiap detail
                    $detailId = "PBD{$date}" . str_pad($counterDetail, 4, '0', STR_PAD_LEFT);

                    // Hitung total biaya
                    $harga = (float) str_replace('.', '', $request->harga[$index] ?? 0);
                    $qty = (float) str_replace('.', '', $request->qty[$index] ?? 1);
                    $total = $harga * $qty;

                    // Simpan data detail
                    $detailData[] = [
                        'id' => $detailId,
                        'pembelian_id' => $finId,
                        'barang_id' => $barangId,
                        'keterangan' => $request->keterangan[$index] ?? '',
                        'harga' => $harga,
                        'qty' => $request->qty[$index] ?? null,
                        'total' => $total,
                        'created_by' => auth()->user()->id,
                    ];
                    // **Increment counter agar ID berikutnya unik**
                    $counterDetail++;
                }
            }

            // Cek apakah ID sudah unik sebelum di insert
            if (count($detailData) > 0) {
                DB::table('finance_pembelian_detail')->insert($detailData);
            }

            DB::commit();
            return redirect()->route('finance.index')->with('success', 'Data Pembelian Berhasil Ditambahkan');
        } catch (\Exception $e) {
            DB::rollback();
            // Log the error message
            Log::error('Error storing pembelian: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data pembelian.');
        }
    }
}
