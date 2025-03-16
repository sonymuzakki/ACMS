<?php

namespace App\Http\Controllers\Pos;

use App\Models\Merk;
use App\Helper\tisas;
use App\Models\inventory;
use App\Models\Penjualan;
use App\Exports\Appraisal;
use App\Exports\AppraisalExport;
use App\Models\JenisMobil;
use App\Models\ProspekBeli;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Exports\ProspekBeliExport;
use Illuminate\Support\Facades\Log;
// use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class AktifitasBeliController extends Controller
{

    // Api
        // Get Sales dan SPV
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
            try {
                $tisas = new Tisas();

                $response = $tisas->generateAccessToken($this->credential);
                Log::info('Token generation response: ', ['response' => $response]);

                if (isset($response->data->token)) {
                    $token = $response->data->token;
                    $sales = $tisas->getSpv($token, []);
                    return response()->json($sales);
                } else {
                    Log::error('Failed to generate token', ['response' => $response]);
                    return response()->json([
                        'error' => 'Failed to generate token.'
                    ], 401);
                }
            } catch (\Exception $e) {
                // Log the exception message
                Log::error('Error in getSpv: ' . $e->getMessage());

                // Return a user-friendly error message
                return response()->json([
                    'error' => 'An error occurred while fetching SPV data.',
                    'message' => $e->getMessage()
                ], 500);
            }
        }

        // End Get Sales dan SPV
    // End Api get

    public function index(Request $request)
    {

        $data = ProspekBeli::latest();

        if($request->ajax()) {

            // Handle date filters
            if ($request->startDate && $request->endDate) {
                $startDate = Carbon::parse($request->startDate)->startOfDay();
                $endDate = Carbon::parse($request->endDate)->endOfDay();
                $data->whereBetween('created_at', [$startDate, $endDate]);
            }

            $data = $data->get();

            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('merk.nama', function ($inventaris) {
                    return $inventaris->merk->nama;
                })
                ->addColumn('action',function($row) {
                })
                ->toJson();
        }
        return view('backend.aktifitas.beli.index_beli');
    }

    public function add()
    {
        $tisas = new tisas;

        $response = $tisas->generateAccessToken($this->credential);
        $token = $response->data->token;

        // Mendapatkan data penjualan
        $salesData = $tisas->getSales($token, []);
        $spvData = $tisas->getSpv($token, []);

        $data = ProspekBeli::all();
        $merk = Merk::all();
        $jenis = JenisMobil::all();

        return view('backend.aktifitas.beli.add_prospek', [
            'sales' => $salesData->data,
            'spv' => $spvData->data,
            'data' => $data,
            'merk' => $merk,
            'jenis' => $jenis,
        ]);
    }

    public function store(Request $request)
    {
        $requestData = $request->validate([
            'nopol' => 'required',
            'type' => 'required',
            'merk_id' => 'required',
            'tahun' => 'required',
            'harga' => 'nullable',
            'nego_harga' => 'nullable',
            'pic' => 'required',
            'nama_pic' => 'nullable',
            'tanggal' => 'required',
            'spv' => 'nullable',
            'sales' => 'nullable',
            'lihat_unit' => 'required',
            'waktu_appraisal' => 'nullable',
            'foto_depan' => 'required',
            'foto_belakang' => 'required',
            'foto_kiri' => 'required',
            'foto_kanan' => 'required',
            'km' => 'nullable',
            'kondisi_unit' => 'nullable',
            'kondisi_pajak' => 'required',
            'bulan_pajak' => 'nullable',
            'kategori_prospek' => 'required',
            'trade_in' => 'required',
            'trade_in_cat' => 'nullable',
            'trade_in_Kriteria' => 'nullable|array', // Validate as an array
            'trade_in_Kriteria.*' => 'in:New,A2,RO', // Validate each value
            'trade_in_UnitBaru' => 'nullable',
            'trade_in_customer' => 'nullable',
            'ambil_unit' => 'required',
            'closing_harga' => 'nullable',
            'alasan' => 'nullable',
            'jenis_id' => 'nullable',
            'warna' => 'nullable',
        ],
        [
            'nopol.required' => 'No Polisi tidak boleh kosong',
            'type.required' => 'Type tidak boleh kosong',
            'merk_id.required' => 'Merk tidak boleh kosong',
            'tahun.required' => 'Tahun tidak boleh kosong',
            'harga.required' => 'Harga tidak boleh kosong',
            'nego_harga.required' => 'Nego Harga tidak boleh kosong',
            'pic.required' => 'PIC tidak boleh kosong',
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'spv.required' => 'SPV tidak boleh kosong',
            'sales.required' => 'Sales tidak boleh kosong',
            'lihat_unit.required' => 'Lihat Unit tidak boleh kosong',
            'waktu_appraisal.required' => 'Waktu Appraisal tidak boleh kosong',
            'foto_depan.required' => 'Foto Depan tidak boleh kosong',
            'foto_belakang.required' => 'Foto Belakang tidak boleh kosong',
            'foto_kiri.required' => 'Foto Kiri tidak boleh kosong',
            'foto_kanan.required' => 'Foto Kanan tidak boleh kosong',
            'km.required' => 'Kilometer tidak boleh kosong',
            'kondisi_unit.required' => 'Kondisi Unit tidak boleh kosong',
            'kondisi_pajak.required' => 'Kondisi Pajak tidak boleh kosong',
            'bulan_pajak.required' => 'Tahun Pajak tidak boleh kosong',
            'kategori_prospek.required' => 'Kategori Prospek tidak boleh kosong',
            'trade_in.required' => 'Trade In tidak boleh kosong',
            // 'trade_in_Kriteria.required' => 'Trade In Kriteria tidak boleh kosong',

            'trade_in_Kriteria.*.in' => 'Invalid selection for Trade In Kriteria',
            'trade_in_UnitBaru.required' => 'Trade In Unit Baru tidak boleh kosong',
            'trade_in_customer.required' => 'Trade In Customer tidak boleh kosong',
            'ambil_unit.required' => 'Ambil Unit tidak boleh kosong',
            'closing_harga.required' => 'Closing Harga tidak boleh kosong',
            'alasan.required' => 'Alasan tidak boleh kosong',
        ]);

        // Menghapus titik (.) dari nilai input harga jual dan harga beli
            $requestData['harga'] = str_replace('.', '', $requestData['harga']);
            $requestData['nego_harga'] = str_replace('.', '', $requestData['nego_harga']);
            $requestData['closing_harga'] = str_replace('.', '', $requestData['closing_harga']);

            // Mengkonversi nilai harga jual dan harga beli menjadi integer
            $requestData['harga'] = (int) $requestData['harga'];
            $requestData['nego_harga'] = (int) $requestData['nego_harga'];
            $requestData['closing_harga'] = (int) $requestData['closing_harga'];
        // End

         // convert array dan hapus titik
        if (isset($requestData['trade_in_Kriteria'])) {
            $requestData['trade_in_Kriteria'] = implode(', ', $requestData['trade_in_Kriteria']);
        }

        // dd($requestData);

        $data = new ProspekBeli;
        $data->fill($requestData);
        $data->save();

        $notification = [
            'message' => 'Data Insert Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('prospecting.beli')->with($notification);
    }

    // Find Data modal add_mobkas
    public function findData(Request $request)
    {
        if($request->ajax()){
            $data = ProspekBeli::where('ambil_unit','Ya, Intercom')
                ->whereNotNull('closing_harga')
                ->get();

            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('action',function($row) {
                })
                ->toJson();
        }
    }

    public function export(Request $request)
    {
        $month = $request->input('month');
        // dd($month);
        return Excel::download(new ProspekBeliExport($month), 'prospek_beli.xlsx');
    }

    public function exportAppraisal(Request $request)
    {
        $month = $request->input('month');
        return Excel::download(new Appraisal($month), 'Appraisal.xlsx');
    }

    public function view(Request $request)
    {
        // Mengambil bulan dan tahun dari request, atau menggunakan bulan dan tahun saat ini sebagai default
        // $month = $request->input('month', now()->month);
        // $year = $request->input('year', now()->year);

        $monthYear = $request->input('monthYear', Carbon::now()->format('Y-m'));

        // Menentukan interval tanggal
        $intervals = [
            ['start' => 1, 'end' => 7],
            ['start' => 8, 'end' => 14],
            ['start' => 15, 'end' => 21],
            ['start' => 22, 'end' => 28],
            ['start' => 29, 'end' => Carbon::createFromDate($monthYear)->endOfMonth()->day]
        ];

        $appraisal = [];
        $totalAppr = 0;

        foreach ($intervals as $interval) {
            $start_date = Carbon::createFromDate($monthYear, $interval['start'])->startOfDay();
            $end_date = Carbon::createFromDate($monthYear, $interval['end'])->endOfDay();

            $intervalTotal = ProspekBeli::where('lihat_unit', 'Ya')
                                ->whereBetween('tanggal', [$start_date, $end_date])
                                ->count();

            $appraisal[] = [
                'start' => $start_date->format('Y-m-d'),
                'end' => $end_date->format('Y-m-d'),
                'total' => $intervalTotal
            ];

            $totalAppr += $intervalTotal;
        }

        $jualTrade = [];
        $totalJualTrade = 0;

        foreach ($intervals as $interval) {
            $start_date = Carbon::createFromDate($monthYear, $interval['start'])->startOfDay();
            $end_date = Carbon::createFromDate($monthYear, $interval['end'])->endOfDay();

            $intervalTotal = inventory::where('keterangan', 'Trade In')
                                ->whereHas('aktifitas.penjualan', function ($query) use ($start_date, $end_date) {
                                    $query->whereBetween('tgl_jual', [$start_date, $end_date]);
                                })
                                ->count();

            $jualTrade[] = [
                'start' => $start_date->format('Y-m-d'),
                'end' => $end_date->format('Y-m-d'),
                'total' => $intervalTotal
            ];

            // $totalJualTrade += $intervalTotal;
        }

        $beliTrade = [];
        $totalBeliTrade = 0;

        foreach ($intervals as $interval) {
            $start_date = Carbon::createFromDate($monthYear, $interval['start'])->startOfDay();
            $end_date = Carbon::createFromDate($monthYear, $interval['end'])->endOfDay();

            $intervalTotal = inventory::where('keterangan', 'Trade In')
                                ->whereBetween('tgl_beli', [$start_date, $end_date])
                                ->count();

            $beliTrade[] = [
                'start' => $start_date->format('Y-m-d'),
                'end' => $end_date->format('Y-m-d'),
                'total' => $intervalTotal
            ];

            $totalBeliTrade += $intervalTotal;
        }

        $jualDirect = [];
        $totalJualDirect = 0;

        foreach ($intervals as $interval) {
            $start_date = Carbon::createFromDate($monthYear, $interval['start'])->startOfDay();
            $end_date = Carbon::createFromDate($monthYear, $interval['end'])->endOfDay();

            $intervalTotal = inventory::where('keterangan', 'Direct')
                                ->whereHas('aktifitas.penjualan', function ($query) use ($start_date, $end_date) {
                                    $query->whereBetween('tgl_jual', [$start_date, $end_date]);
                                })
                                ->count();

            $jualDirect[] = [
                'start' => $start_date->format('Y-m-d'),
                'end' => $end_date->format('Y-m-d'),
                'total' => $intervalTotal
            ];

            $totalJualDirect += $intervalTotal;
        }

        $beliDirect = [];
        $totalBeliDirect = 0;

        foreach ($intervals as $interval) {
            $start_date = Carbon::createFromDate($monthYear, $interval['start'])->startOfDay();
            $end_date = Carbon::createFromDate($monthYear, $interval['end'])->endOfDay();

            $intervalTotal = inventory::where('keterangan', 'Direct')
                                ->whereBetween('tgl_beli', [$start_date, $end_date])
                                ->count();

            $beliDirect[] = [
                'start' => $start_date->format('Y-m-d'),
                'end' => $end_date->format('Y-m-d'),
                'total' => $intervalTotal
            ];

            $totalBeliDirect += $intervalTotal;
        }

        $jualDireksi = [];
        $totalJualDireksi = 0;

        foreach ($intervals as $interval) {
            $start_date = Carbon::createFromDate($monthYear, $interval['start'])->startOfDay();
            $end_date = Carbon::createFromDate($monthYear, $interval['end'])->endOfDay();

            $intervalTotal = inventory::where('keterangan', 'Titipan Direksi')
                                ->whereHas('aktifitas.penjualan', function ($query) use ($start_date, $end_date) {
                                    $query->whereBetween('tgl_jual', [$start_date, $end_date]);
                                })
                                ->count();

            $jualDireksi[] = [
                'start' => $start_date->format('Y-m-d'),
                'end' => $end_date->format('Y-m-d'),
                'total' => $intervalTotal
            ];

            $totalJualDireksi += $intervalTotal;
        }

        $beliDireksi = [];
        $totalBeliDireksi = 0;

        foreach ($intervals as $interval) {
            $start_date = Carbon::createFromDate($monthYear, $interval['start'])->startOfDay();
            $end_date = Carbon::createFromDate($monthYear, $interval['end'])->endOfDay();

            $intervalTotal = Inventory::where('keterangan', 'Titipan Direksi')
                                ->whereBetween('tgl_beli', [$start_date, $end_date])
                                ->count();

            $beliDireksi[] = [
                'start' => $start_date->format('Y-m-d'),
                'end' => $end_date->format('Y-m-d'),
                'total' => $intervalTotal
            ];

            $totalBeliDireksi += $intervalTotal;
        }

        $jualTrade = [];
        $totalBeliDireksi = 0;

        foreach ($intervals as $interval) {
            $start_date = Carbon::createFromDate($monthYear, $interval['start'])->startOfDay();
            $end_date = Carbon::createFromDate($monthYear, $interval['end'])->endOfDay();

            $intervalTotal = Inventory::where('keterangan', 'Titipan Direksi')
                                ->whereBetween('tgl_beli', [$start_date, $end_date])
                                ->count();

            $jualTrade[] = [
                'start' => $start_date->format('Y-m-d'),
                'end' => $end_date->format('Y-m-d'),
                'total' => $intervalTotal
            ];

            $totalBeliDireksi += $intervalTotal;
        }

        $jualDirect = [];
        foreach ($intervals as $interval) {
            $start_date = Carbon::createFromDate($monthYear, $interval['start'])->startOfDay();
            $end_date = Carbon::createFromDate($monthYear, $interval['end'])->endOfDay();

            $jualDirect[] = [
                'total' => Inventory::where('keterangan', 'Direct')
                    ->whereHas('aktifitas.penjualan', function ($query) use ($start_date, $end_date) {
                        $query->whereBetween('tgl_jual', [$start_date, $end_date]);
                    })
                    ->count()
            ];
        }

        return view('backend.report.appraisal', [
            // 'month' => $month,
            // 'year' => $year,
            'monthYear' => $monthYear,
            // Appraisal
            'appraisal' => $appraisal,
            'totalAppr' => $totalAppr,

            // Jual Trade In
            'jualTrade' => $jualTrade,
            'totalJualTrade' => $totalJualTrade,
            // Beli Trade
            'beliTrade' => $beliTrade,
            'totalBeliTrade' => $totalBeliTrade,

            // Direct Purchase
            'jualDirect' => $jualDirect,
            'totalJualDirect' => $totalJualDirect,

            'beliDirect' => $beliDirect,
            'totalBeliDirect' => $totalBeliDirect,

            // Titipan Direksi
            'jualDireksi' => $jualDireksi,
            'totalJualDireksi' => $totalJualDireksi,

            'beliDireksi' => $beliDireksi,
            'totalBeliDireksi' => $totalBeliDireksi,


        ]);
    }

}
