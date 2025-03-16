<?php

namespace App\Http\Controllers\Pos;

use App\Models\Keep;
use App\Models\User;
use App\Helper\tisas;
use App\Models\Aktifitas;
use App\Models\inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Exports\AktifitasExport;
use App\Exports\AktivitasExport;
use App\Exports\ExportAktifitas;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class AktifitasController extends Controller
{

    public function index(Request $request)
    {
        $query = Aktifitas::select('aktifitas.*', 'inventory.nopol', 'inventory.type', 'inventory.tahun')
            ->leftJoin('inventory', 'aktifitas.inventory_id', '=', 'inventory.id')
            ->orderBy('created_at', 'desc');

        if ($request->startDate && $request->endDate) {
            $startDate = Carbon::parse($request->startDate)->startOfMonth();
            $endDate = Carbon::parse($request->endDate)->endOfMonth();
            $query->whereBetween('aktifitas.created_at', [$startDate, $endDate]);
        } else {
            // Default to the current month if no dates are provided
            $currentMonth = Carbon::now()->month;
            $query->whereMonth('aktifitas.created_at', $currentMonth);
        }

        $data = $query->get();

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                })
                ->toJson();
        }

        return view('backend.aktifitas.index');
    }

    public function index_beli(Request $request)
    {
        $query = Aktifitas::select('aktifitas.*', 'inventory.nopol', 'inventory.type', 'inventory.tahun')
            ->leftJoin('inventory', 'aktifitas.inventory_id', '=', 'inventory.id')
            ->orderBy('created_at', 'desc');

        if ($request->startDate && $request->endDate) {
            $startDate = Carbon::parse($request->startDate)->startOfMonth();
            $endDate = Carbon::parse($request->endDate)->endOfMonth();
            $query->whereBetween('aktifitas.created_at', [$startDate, $endDate]);
        } else {
            // Default to the current month if no dates are provided
            $currentMonth = Carbon::now()->month;
            $query->whereMonth('aktifitas.created_at', $currentMonth);
        }

        $data = $query->get();

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                })
                ->toJson();
        }

        return view('backend.aktifitas.index_beli');
    }


    // Add this method to your controller
    public function filterAktifitas(Request $request)
    {
        $startDate = Carbon::parse($request->startDate)->startOfMonth();
        $endDate = Carbon::parse($request->endDate)->endOfMonth();

        $filteredData = Aktifitas::whereBetween('created_at', [$startDate, $endDate])->get();

        return response()->json($filteredData);
    }

    public function getSalesBySpv($spvId)
    {
        $response = Http::get('https://crm.toyotaintercom.com/api/syncdata/getsales/' . $spvId);
        $salesData = $response->json();

        return response()->json($salesData);
    }

    public function add()
    {

        $tisas = new tisas;

        $response = $tisas->generateAccessToken($this->credential);
        $token = $response->data->token;

        // Mendapatkan data penjualan
        $salesData = $tisas->getSales($token, []);
        $spvData = $tisas->getSpv($token, []);

        $data = Aktifitas::all();

        // Mengambil nama customer dari aktifitas tanpa duplikasi
        $customerNames = Aktifitas::distinct('nama_customer')->pluck('nama_customer');

        // Membuat koleksi baru berdasarkan nama pelanggan
        $customers = collect();

        foreach ($customerNames as $customerName) {
            $customers->push(['nama_customer' => $customerName]);
        }

        $inventory = Inventory::whereNotIn('status', [2])->get();

        return view('backend.aktifitas.add', [
            'sales' => $salesData->data, // Ubah $salesData->data ke $sales
            'spv' => $spvData->data, // Ubah $salesData->data ke $spv
            'data' => $data,
            'customers' => $customers,
            'inventory' => $inventory
        ]);
        // return view('backend.aktifitas.add', compact('data', 'inventory', 'customers'));
    }


    public function getInfoByNopol($id)
    {
        // Ambil data berdasarkan ID yang diberikan
        $inventory = Inventory::findOrFail($id);

        // Format data sesuai kebutuhan
        $response = [
            'type' => $inventory->type,
            'tahun' => $inventory->tahun,
            'merk' => $inventory->merk->nama
        ];

        // Kembalikan data dalam format JSON
        return response()->json($response);
    }

    // Get Sales dan SPV
    protected $credential;

    public function __construct()
    {
        $this->credential = ['username' => 'intercom', 'password' => 'intercom123'];
    }

    public function getSales()
    {
        $tisas = new tisas;

        $response = $tisas->generateAccessToken($this->credential);
        $token = $response->data->token;
        $sales = $tisas->getSales($token, []);
        // dd($sales);
        return response()->json($sales);
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
    // End Get Sales dan SPV

    public function store(Request $request)
    {
        // Validasi input form
        $request->validate(
            [
                'inventory_id' => 'required|exists:inventory,id|max:50',
                'nama_customer' => 'nullable',
                'sumber_prospek' => 'required|in:Walk In,Marketplace,Web Trust,Instagram,OLX,Referensi,Sales UC,Sales IC,Database',
                'category' => 'required',
                'jenis_pembelian' => 'nullable',
                'no_spk' => 'nullable',
            ],
            [
                'inventory_id.required' => 'No Polisi tidak boleh kosong.',
                'nama_customer.required' => 'Nama Customer tidak boleh kosong.',
                'sumber_prospek.required' => 'Sumber Prospek harus dipilih.',
                'sumber_prospek.in' => 'Sumber Prospek tidak valid.',
                'category.required' => 'Category harus dipilih.',
            ]
        );

        $prospek = new Aktifitas();
        $prospek->inventory_id = $request->input('inventory_id');
        $prospek->nama_customer = $request->input('nama_customer');
        $prospek->sumber_prospek = $request->input('sumber_prospek');
        $prospek->category = $request->input('category');
        $prospek->jenis_pembelian = $request->input('jenis_pembelian');
        $prospek->no_spk = $request->input('no_spk');
        $prospek->save();

        // Check if no_spk is provided and update inventory status accordingly
        if (!empty($request->input('no_spk'))) {
            $inventory = Inventory::find($request->input('inventory_id'));
            if ($inventory) {
                $inventory->status = 1;
                $inventory->save();
            }
        }

        // Redirect atau lakukan sesuatu setelah data disimpan
        return redirect()->route('aktifitas.index');
    }

    public function dashboard()
    {
        $mobil = inventory::count();
        $mobilSold = inventory::whereIn('status', [2])->count();
        $mobilAvailable = inventory::whereIn('status', [0, 1])->count();

        return view('master1.dashboard', compact('mobil', 'mobilSold', 'mobilAvailable'));
    }

    public function exports()
    {
        // return  Excel::download(new AllExportUc, $fileName, \Maatwebsite\Excel\Excel::XLSX);
        return Excel::download(new ExportAktifitas, 'Report Aktifitas.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }

    public function export()
    {
        return Excel::download(new ExportAktifitas, 'aktivitas.xlsx');

    }

    public function index_leads(Request $request)
    {
        $data = Keep::with('inventory')->latest();

        if($request->ajax()) {
            // Apply date filters if provided
            if ($request->startDate && $request->endDate) {
                $startDate = Carbon::parse($request->startDate)->startOfDay();
                $endDate = Carbon::parse($request->endDate)->endOfDay();
                $data->whereBetween('created_at', [$startDate, $endDate]);
            }

            // Fetch the data
            $data = $data->get();

            // Return the data in a format DataTables expects
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    return '<span class="badge bg-info text-white">Follow Up</span>';
                })
                ->toJson();
        }

        return view('backend.aktifitas.leadSales.index_leads');
    }

    public function updateStatus(Request $request, $id)
    {
        $lead = Keep::find($id);
        $lead->status = $request->status;
        $lead->keterangan = $request->keterangan;
        $lead->save();

        return response()->json(['success' => 'Status updated successfully']);
    }

}
