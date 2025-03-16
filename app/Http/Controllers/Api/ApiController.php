<?php

namespace App\Http\Controllers\Api;

use App\Models\Keep;
use App\Models\inventory;
use App\Models\ApiLeadsBeli;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\StoreApiLeadsBeliRequest;

class ApiController extends Controller
{

    public function index(Request $request)
    {
        // Ambil parameter query untuk filter
        $merk = $request->input('merk');
        $minHarga = $request->input('min_harga');
        $maxHarga = $request->input('max_harga');

        // Bangun query dengan filter
        $query = inventory::with('merk')
            ->select(
                'inventory.nopol', 'inventory.type', 'inventory.km', 'inventory.no_rangka',
                'inventory.model', 'inventory.warna', 'inventory.tahun', 'inventory.transmisi',
                'inventory.harga_jual', 'inventory.image', 'inventory.simulasi',
                'inventory.leasing', 'inventory.dp_setor', 'inventory.angsuran',
                'inventory.tenor', 'inventory.status', 'merk.nama as merk_name',
                'inventory.created_at'
            )
            ->join('merk', 'inventory.merk_id', '=', 'merk.id')
            ->where('inventory.status', '<>', 2);  // Filter untuk status selain 2

        if ($merk) {
            $query->where('merk.nama', $merk);
        }

        if ($minHarga && $maxHarga && $minHarga <= $maxHarga) {
            $query->whereBetween('inventory.harga_jual', [$minHarga, $maxHarga]);
        } elseif ($minHarga) {
            $query->where('inventory.harga_jual', '>=', $minHarga);
        } elseif ($maxHarga) {
            $query->where('inventory.harga_jual', '<=', $maxHarga);
        }

        // Pastikan pengurutan menggunakan inventory.created_at
        $posts = $query->orderBy('inventory.created_at', 'desc')->paginate(5);

        if ($posts->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
                'data' => []
            ]);
        }

        // Kembalikan koleksi data sebagai resource
        return new PostResource(true, 'Daftar Data Posts', $posts);
    }

    public function search($param)
    {
        // return new PostResource(true, 'Data berhasil Ditemukan', $data);
        $data = Inventory::select(
            'inventory.nopol',
            'inventory.type',
            'inventory.km',
            'inventory.no_rangka',
            'inventory.model',
            'merk.nama as merk_name',
            'inventory.warna',
            'inventory.tahun',
            'inventory.transmisi',
            'inventory.harga_jual',
            'inventory.image',
            'inventory.simulasi',
            'inventory.leasing',
            'inventory.dp_setor',
            'inventory.angsuran',
            'inventory.tenor',
            'inventory.status',
            'inventory.created_at'
        )
        ->join('merk', 'inventory.merk_id', '=', 'merk.id')
        ->where(function($query) use ($param) {
            $query->where('model', 'like', '%' . $param . '%')
                  ->orWhere('nopol', 'like', '%' . $param . '%')
                  ->orWhereHas('merk', function($query) use ($param) {
                      $query->where('nama', 'like', '%' . $param . '%');
                  });
        })
        ->where('inventory.status', '!=', 2)
        ->get();

        if ($data->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
                'data' => []
            ]);
        }

        return new PostResource(true, 'Data berhasil Ditemukan', $data);
    }

    public function show($id)
    {
        $post = inventory::find($id);
        //return single post as a resource
        return new PostResource(true, 'Data Post Ditemukan!', $post);
    }

    // public function keep(Request $request)
    // {
    //     // Validasi input
    //     $validatedData = $request->validate([
    //         'keep' => 'required|',
    //         'nopol' => 'required|',
    //         'nama_sales_keep' => 'required|string',
    //         'nama_customer_keep' => 'required|string',
    //         'nego' => 'required|',
    //     ],
    //     [
    //         // 'keep.required' => '',
    //         'nopol.required' => 'Masukkan Nopol',
    //         'nama_sales_keep.required' => 'Masukkan Nama Sales',
    //         'nama_customer_keep.required' => 'Masukkan Nama Customer',
    //         'nego.required' => 'Masukkan Nego',
    //     ]);

    //     // Ambil data dari input
    //     $keep = $validatedData['keep'];
    //     $nopol = $validatedData['nopol'];
    //     $namaSales = $validatedData['nama_sales_keep'];
    //     $namaCustomer = $validatedData['nama_customer_keep'];
    //     $nego = $validatedData['nego'] ?? false;

    //     // Simpan data ke database
    //     $inventory = Inventory::where('nopol', $nopol)->first();
    //     if ($inventory) {
    //         $inventory->keep = $keep;
    //         $inventory->nama_sales_keep = $namaSales;
    //         $inventory->nama_customer_keep = $namaCustomer;
    //         $inventory->nego = $nego;
    //         $inventory->save();

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Data berhasil disimpan',
    //         ]);
    //     }

    //     if ($inventory->isEmpty()) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Data tidak tersimpan',
    //             'data' => []
    //         ]);
    //     }

    //     return new PostResource(true, 'Data berhasil Ditemukan', $inventory);
    // }

    public function keep(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'keep' => 'required',
            'nopol' => 'required|string',
            'nama_sales_keep' => 'required|string',
            'nama_customer_keep' => 'required|string',
            'nego' => 'required',
        ],
        [
            'nopol.required' => 'Masukkan Nopol',
            'nama_sales_keep.required' => 'Masukkan Nama Sales',
            'nama_customer_keep.required' => 'Masukkan Nama Customer',
            'nego.required' => 'Masukkan Nego',
        ]);

        // Ambil data dari input
        $keep = $validatedData['keep'];
        $nopol = $validatedData['nopol'];
        $namaSales = $validatedData['nama_sales_keep'];
        $namaCustomer = $validatedData['nama_customer_keep'];
        $nego = $validatedData['nego'];

        // Temukan inventory berdasarkan nopol
        $inventory = Inventory::where('nopol', $nopol)->first();
        if ($inventory) {
            // Simpan data ke tabel keep
            $keep = Keep::create([
                'inventory_id' => $inventory->id,
                'nama_sales_keep' => $namaSales,
                'nama_customer_keep' => $namaCustomer,
                'keep' => $keep,
                'nego' => $nego,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil disimpan',
                'data' => $keep,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data tidak tersimpan. Inventory tidak ditemukan.',
            'data' => []
        ]);
    }

    public function resetCache()
    {
        // Logika untuk mereset cache
        Cache::flush();

        return response()->json([
            'success' => true,
            'message' => 'Cache berhasil direset'
        ]);
    }

    public function store(StoreApiLeadsBeliRequest $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_sales' => 'required|string|max:255',
            'nama_panggilan' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'rencana_penggunaan' => 'required|string|max:255',
            'jenis_pembelian' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);

        // Buat data baru
        $validatedData = ApiLeadsBeli::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $validatedData
        ], 201);
    }


}
