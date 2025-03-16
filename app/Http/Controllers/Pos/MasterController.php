<?php

namespace App\Http\Controllers\Pos;

use App\Models\Merk;
use App\Helper\tisas;
use App\Models\inventory;
use App\Models\JenisMobil;
use App\Exports\StockExport;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use Illuminate\Support\Carbon;
use App\Exports\InventoryExport;
use App\Exports\StockBeliExport;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log; // Import the Log facade

class MasterController extends Controller
{
    protected $credential;

    public function __construct()
    {
        $this->credential = ['username' => 'intercom', 'password' => 'intercom123'];
    }

    public function getSales()
    {
        try {
            $tisas = new tisas;

            $response = $tisas->generateAccessToken($this->credential);
            $token = $response->data->token;
            $sales = $tisas->getSales($token, []);

            return response()->json($sales);
        } catch (\Exception $e) {
            // Log the exception message
            Log::error('Error in getSales: ' . $e->getMessage());

            // Return a user-friendly error message
            return response()->json([
                'error' => 'An error occurred while fetching sales data.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getSpv()
    {
        $tisas = new tisas;

        $response = $tisas->generateAccessToken($this->credential);
        $token = $response->data->token;
        $sales = $tisas->getSpv($token, []);
        // dd($sales);
        return response()->json($sales);
    }

    // Merk Controller
    public function index(Request $request)
    {
        $data = Merk::all();
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
        return view('backend1.master.merk.index', compact('data'));
    }

    public function add(Request $request)
    {
        $data = Merk::all();
        return view('backend1.master.merk.add', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Merk::create([
            'nama' => $request->nama,
        ]);
        $notification = [
            'message' => 'Inventory Insert Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('master.merk')->with($notification);
    }

    public function edit($id)
    {
        $data = Merk::find($id);
        return view('backend1.master.merk.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Merk::findOrFail($id);
        $data->update([
            'nama' => $request->nama,
            ]);
        return redirect()->route('master.merk');
    }

    public function delete($id)
    {
        Merk::find($id)->delete();
        return redirect()->back();
    }

    // Mobkas Controller

    // public function json()
    // {
    //     return DataTables::of(inventory::limit(10))->make(true);
    // }

    // public function index_json(Request $request)
    // {
    //     $data = inventory::with('Merk')->latest();

    //     if ($request->ajax()) {
    //         // Handle date filters
    //         if ($request->startDate && $request->endDate) {
    //             $startDate = Carbon::parse($request->startDate)->startOfDay();
    //             $endDate = Carbon::parse($request->endDate)->endOfDay();
    //             $data->whereBetween('created_at', [$startDate, $endDate]);
    //         }

    //         // Handle status switch
    //         if ($request->statusToggle == 0) {
    //             $data->where('status', '!=', 2);
    //         }

    //         $data = $data->get();

    //         return DataTables::of($data)
    //             ->addIndexColumn()
    //             ->addColumn('merk.nama', function ($inventaris) {
    //                 return $inventaris->merk ? $inventaris->merk->nama : '-';
    //             })
    //             ->rawColumns(['action'])
    //             ->make(true);
    //     }

    //     return view('backend1.master.mobkas.mokas', compact('data'));
    // }

    public function index_json(Request $request)
    {
        $data = Inventory::with('merk')->latest();

        if ($request->ajax()) {
            if ($request->startDate && $request->endDate) {
                $startDate = Carbon::parse($request->startDate)->startOfDay();
                $endDate = Carbon::parse($request->endDate)->endOfDay();
                $data->whereBetween('tgl_beli', [$startDate, $endDate]);
            }

            // Apply custom filter if provided
            if ($request->customFilter) {
                $data->where(function($query) use ($request) {
                    $query->where('nopol', 'like', '%' . $request->customFilter . '%')
                        ->orWhere('type', 'like', '%' . $request->customFilter . '%')
                        ->orWhere('km', 'like', '%' . $request->customFilter . '%')
                        ->orWhere('model', 'like', '%' . $request->customFilter . '%')
                        ->orWhere('warna', 'like', '%' . $request->customFilter . '%')
                        ->orWhere('tahun', 'like', '%' . $request->customFilter . '%')
                        ->orWhere('transmisi', 'like', '%' . $request->customFilter . '%')
                        ->orWhereHas('merk', function($q) use ($request) {
                            $q->where('nama', 'like', '%' . $request->customFilter . '%');
                        });
                });
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('merk.nama', function ($row) {
                    return $row->merk ? $row->merk->nama : '-';
                })
                ->addColumn('action', function ($row) {
                    if ($row->status == 2) {
                        return '-';
                    }
                    return '<a href="/mokas/edit/' . $row->id . '" class="btn btn-success btn-sm mr-2"><i class="fas fa-edit"></i></a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend1.master.mobkas.mokas');
    }

    public function get_allData()
    {
        // Query untuk mendapatkan semua data inventaris dengan status kecuali 2
        $inventories = Inventory::all();

        // Kembalikan data dalam bentuk HTML yang sesuai
        $html = '';
        foreach ($inventories as $inventory) {
            $html .= '<tr>';
            // Tambahkan data dari setiap baris inventaris ke dalam HTML
            // Contoh: $html .= '<td>' . $inventory->field_name . '</td>';
            $html .= '<td>' . $inventory->id . '</td>';
            $html .= '<td>' . $inventory->nopol . '</td>';
            $html .= '<td>' . $inventory->type . '</td>';
            $html .= '<td>' . $inventory->km . '</td>';
            $html .= '<td>' . $inventory->merk->nama . '</td>';
            $html .= '<td>' . $inventory->model . '</td>';
            $html .= '<td>' . $inventory->warna . '</td>';
            $html .= '<td>' . $inventory->tahun . '</td>';
            $html .= '<td>' . $inventory->transmisi . '</td>';
            $html .= '<td>' . $inventory->tgl_beli . '</td>';
            $html .= '<td>' . $inventory->penjual . '</td>';
            $html .= '<td>' . $inventory->harga_beli . '</td>';
            $html .= '<td>' . $inventory->status . '</td>';
        }

        // Kembalikan HTML yang dibuat untuk dimasukkan ke dalam tbody tabel
        return $html;
    }

    public function add_uc(Request $request)
    {
        $tisas = new tisas;

        $response = $tisas->generateAccessToken($this->credential);
        $token = $response->data->token;

        // Mendapatkan data penjualan
        $salesData = $tisas->getSales($token, []);
        $spvData = $tisas->getSpv($token, []);

        $data = inventory::all();
        $merk = Merk::all();
        // return view('backend.master.mobkas.mokas_add', ['sales' => $salesData->data], ['spv' => $salesData->data], compact('data', 'merk'));
        return view('backend1.master.mobkas.mokas_add', [
            'sales' => $salesData->data, // Ubah $salesData->data ke $sales
            'spv' => $spvData->data, // Ubah $salesData->data ke $spv
            'data' => $data,
            'merk' => $merk,
        ]);
    }

    public function store_uc(Request $request)
    {
        $requestData = $request->validate([
            'nopol' => 'required|string|max:12',
            'type' => 'required|string|max:255',
            'km' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'merk_id' => 'required|string|max:255',
            'warna' => 'required|string|max:255',
            'no_rangka' => 'required|string|max:255',
            'tahun' => 'required|string|max:2024',
            'transmisi' => 'required',
            'tgl_beli' => 'required|string|max:255',
            'penjual' => 'nullable|string|max:255',
            'harga_beli' => 'required|min:2',
            'harga_jual' => 'required|min:2',
            'sales' => 'nullable',
            'spv' => 'nullable',
            'nama_customer' => 'nullable',
            'keterangan' => 'required',
            'komisi' => 'nullable',
            'grade' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'simulasi' => 'nullable',
            'leasing' => 'nullable',
            'dp_setor' => 'nullable',
            'angsuran' => 'nullable',
            'tenor' => 'nullable',
        ],
        [
            'nopol.required' => 'Nomor polisi wajib diisi.',
            'nopol.max' => 'Nomor polisi maksimal 12 karakter.',
            'type.required' => 'Type wajib diisi.',
            'km.required' => 'Kilometer wajib diisi.',
            'model.required' => 'Model wajib diisi.',
            'merk_id.required' => 'Merk wajib dipilih.',
            'warna.required' => 'Warna wajib diisi.',
            'no_rangka.required' => 'Nomor rangka wajib diisi.',
            'tahun.required' => 'Tahun wajib diisi.',
            'tahun.max' => 'Tahun maksimal 2024.',
            'transmisi.required' => 'Transmisi wajib dipilih.',
            'tgl_beli.required' => 'Tanggal beli wajib diisi.',
            'harga_beli.required' => 'Harga beli wajib diisi',
            'harga_beli.min' => 'Harga beli minimal 2 karakter.',
            'harga_jual.required' => 'Harga jual wajib diisi.',
            'harga_jual.min' => 'Harga jual minimal 2 karakter.',
            'image.required' => 'Gambar wajib diupload.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Gambar harus berformat: jpeg, png, jpg, gif.',
            'image.max' => 'Ukuran gambar maksimal 2048 kilobyte.',
            'grade.required' => 'Grade wajib diisi.',
            'keterangan.required' => 'keterangan wajib diisi.',
        ]);

        // Menghapus titik (.) dari nilai input harga jual dan harga beli
            $requestData['harga_jual'] = str_replace('.', '', $requestData['harga_jual']);
            $requestData['harga_beli'] = str_replace('.', '', $requestData['harga_beli']);
            $requestData['dp_setor'] = str_replace('.', '', $requestData['dp_setor']);
            $requestData['angsuran'] = str_replace('.', '', $requestData['angsuran']);
            $requestData['komisi'] = str_replace('.', '', $requestData['komisi']);

            // Mengkonversi nilai harga jual dan harga beli menjadi integer
            $requestData['harga_jual'] = (int) $requestData['harga_jual'];
            $requestData['harga_beli'] = (int) $requestData['harga_beli'];
            $requestData['dp_setor'] = (int) $requestData['dp_setor'];
            $requestData['angsuran'] = (int) $requestData['angsuran'];
            $requestData['komisi'] = (int) $requestData['komisi'];
        // End

        // Menginisialisasi dan menyimpan data inventory
        $data = new inventory;
        $data->fill($requestData);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Membersihkan nomor polisi (nopol) dari karakter yang tidak diizinkan dalam nama file
            $cleanedNopol = preg_replace('/[^a-zA-Z0-9]+/', '', $request->input('nopol'));

            // Membuat nama file dengan nomor polisi yang telah dibersihkan
            $imageName = 'foto-' . $cleanedNopol . '.' . $image->getClientOriginalExtension();

            // Memindahkan file gambar ke direktori yang ditentukan
            $image->move(('images'), $imageName);


            // Menyimpan nama file gambar ke dalam kolom 'image' pada model Inventory
            $data->image = $imageName;
        }

        // dd($requestData);

        // Logic untuk menyimpan gambar (jika ada), dan menyimpan data lainnya
        $data->save();

        $notification = [
            'message' => 'Data Insert Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('master.json')->with($notification);
    }

    public function edit_uc($id)
    {
        $data = inventory::findOrFail($id);

        $tisas = new tisas;

        $response = $tisas->generateAccessToken($this->credential);
        $token = $response->data->token;

        // Mendapatkan data penjualan
        $salesData = $tisas->getSales($token, []);
        $spvData = $tisas->getSpv($token, []);


        $merk = Merk::all();
        // return view('backend.master.mobkas.mokas_add', ['sales' => $salesData->data], ['spv' => $salesData->data], compact('data', 'merk'));
        return view('backend.master.mobkas.mokas_edit', [
            'sales' => $salesData->data, // Ubah $salesData->data ke $sales
            'spv' => $spvData->data, // Ubah $salesData->data ke $spv
            'data' => $data,
            'merk' => $merk,
        ]);
    }

    public function update_uc(Request $request, $id)
    {
        // Temukan data inventory berdasarkan ID
        $inventory = Inventory::findOrFail($id);

        $request->validate([
            'km' => 'nullable',
            'status' => 'nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Tambahkan validasi untuk foto
        ]);

        // Menghapus titik (.) dari nilai input dp_setor dan angsuran
        $dpSetor = isset($request->dp_setor) ? str_replace('.', '', $request->dp_setor) : null;
        $angsuran = isset($request->angsuran) ? str_replace('.', '', $request->angsuran) : null;
        $harga_jual = isset($request->harga_jual) ? str_replace('.', '', $request->harga_jual) : null;
        $harga_beli = isset($request->harga_beli) ? str_replace('.', '', $request->harga_beli) : null;
        $komisi = isset($request->komisi) ? str_replace('.', '', $request->komisi) : null;

        // Mengkonversi nilai dp_setor dan angsuran menjadi integer
        $dpSetor = (int) $dpSetor;
        $angsuran = (int) $angsuran;
        $harga_jual = (int) $harga_jual;
        $harga_beli = (int) $harga_beli;
        $komisi = (int) $komisi;

        // Update data inventory dengan data baru
        $inventory->update([
            'nopol' => $request->nopol,
            'type' => $request->type,
            'km' => $request->km,
            'merk_id' => $request->merk_id,
            'model' => $request->model,
            'warna' => $request->warna,
            'no_rangka' => $request->no_rangka,
            'tahun' => $request->tahun,
            'transmisi' => $request->transmisi,
            'tgl_beli' => $request->tgl_beli,
            'harga_beli' => $harga_beli,
            'harga_jual' => $harga_jual,
            'penjual' => $request->penjual,
            'nama_customer' => $request->nama_customer,
            'keterangan' => $request->keterangan,
            'komisi' => $komisi,
            'grade' => $request->grade,
            'simulasi' => $request->simulasi,
            'leasing' => $request->leasing,
            'dp_setor' => $dpSetor,
            'angsuran' => $angsuran,
            'tenor' => $request->tenor,
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Get the old image path
            $oldImagePath = $inventory->image;

            // Store the new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();

            // Membersihkan nomor polisi (nopol) dari karakter yang tidak diizinkan dalam nama file
            $cleanedNopol = preg_replace('/[^a-zA-Z0-9]+/', '', $request->input('nopol'));

            // Membuat nama file dengan nomor polisi yang telah dibersihkan
            $imageName = 'foto-' . $cleanedNopol . '.' . $image->getClientOriginalExtension();
            $image->move(('images'), $imageName);

            // Update the inventory with new image path
            $inventory->update(['image' => $imageName]);

            // Delete old image if exists
            if ($oldImagePath) {
                Storage::delete('images/' . $oldImagePath);
            }
        }

        $notification = array(
            'message' => 'Data Update Successfully',
            'alert-type' => 'success',
        );

        // Redirect kembali dengan pesan sukses
        return redirect()->route('master.json')->with($notification);
    }

    public function updateStatus(Request $request,$id){

        // Validasi input
        $request->validate([
            'inventory_id' => 'required|exists:inventory,id',
            'status' => 'required|in:0,1,2',
        ]);

        // Cari data inventory berdasarkan ID
        $inventory = Inventory::findOrFail($request->inventory_id);
        $inventory->status = $request->status;
        $inventory->save();

        // Redirect atau lakukan sesuatu setelah status berhasil diperbarui
        return redirect()->back();

    }

    // Jenis Mobil Controller
    public function index_jenis()
    {
        $data = JenisMobil::all();
        return view('backend.master.Jenis.jenis', compact('data'));
    }

    public function add_jenis(Request $request)
    {
        $data = JenisMobil::all();
        return view('backend.master.Jenis.add', compact('data'));
    }

    public function store_jenis(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        JenisMobil::create([
            'nama' => $request->nama,
        ]);

        $notification = [
            'message' => 'Inventory Insert Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('master.jenis')->with($notification);
    }

    public function export_stock(Request $request)
    {
        $exportOption = $request->input('exportOption');
        $startDate = $request->input('start_date') ? $request->input('start_date') . '-01' : null;
        $endDate = $request->input('end_date') ? $request->input('end_date') . '-01' : null;

        Log::info('Exporting ProspekBeli with option: ' . $exportOption . ', from ' . $startDate . ' to ' . $endDate);

        return Excel::download(new StockBeliExport($startDate, $endDate, $exportOption), 'Stock.xlsx');
    }


    public function logout(Request $request)
    {

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function exportInventory(Request $request)
    {
        // $startDate = $request->input('start_date');
        // return Excel::download(new InventoryExport, 'inventory_report_' . now()->format('Y_m_d_H_i_s') . '.xlsx');
        // $month = $request->input('month'); // Pastikan nama inputnya benar
        // // dd($month);
        // return Excel::download(new InventoryExport($month), 'inventory.xlsx');
        $startMonth = $request->input('start_month');
        $endMonth = $request->input('end_month');
        return Excel::download(new InventoryExport($startMonth,$endMonth), 'inventory.xlsx');
    }

}
