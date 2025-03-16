<?php

namespace App\Http\Controllers\Pos;

use App\Models\Aktifitas;
use App\Models\inventory;
use App\Models\Pengajuan;
use App\Models\Penjualan;
use App\Exports\AllExportUc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class PenjualanController extends Controller
{

    public function index(Request $request)
    {
        $data = Penjualan::with('pengajuan', 'aktifitas', 'aktifitas.inventory')->latest();

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                })
                ->toJson();
        }

        return view('backend.penjualan.penjualan', compact('data'));
    }

    public function AddPenjualan()
    {
        $data = Penjualan::with(['aktifitas', 'pengajuan', 'aktifitas.inventory'])->get();

        $spkcs = Aktifitas::where('jenis_pembelian', 'Cash')
                ->whereHas('inventory', function ($query) {
                    $query->whereIn('status',[0,1]);
                })
                ->get();

        // dd($spkcs->all());
        $spkcr = Pengajuan::where('status', '1')->get();

        return view('backend.penjualan.add_penjualan', compact('data', 'spkcs', 'spkcr'));
    }


    public function getData($id)
    {
        $data = Pengajuan::select('leasing', 'tenor', 'angsuran', 'no_spk', 'harga_mobil', 'dp', 'dp_persen')
            ->where('aktifitas_id', $id)
            ->get();

        return response()->json($data);
    }

    public function store(Request $request)
    {
        // Validasi input (jika diperlukan)
        $validated = $request->validate([
            'tgl_jual' => 'required|',
            // Validasi lainnya...
        ]);

        // dd($request->all());

        $jenis = $request->input('jenis_pembelian');
        $tujuan = $request->input('tujuan_pembelian');
        // $tglJual = $request->input('tgl_jual');
        $data = [];

        if ($jenis === 'Cash') {
            $data = [
                'aktifitas_id' => $request->input('nopol_cash'),
                // 'no_spk' => $request->input('no_spk_cs'),
                'no_spk' => str_replace(',', '', $request->input('no_spk_cs')),
                // 'harga_mobil' => str_replace(['.', ','], '', $request->input('hrga_mobil_cs')), // Hapus tanda titik dan koma
                'harga_mobil' => intval(str_replace(['.', ','], '', $request->input('hrga_mobil_cs'))),
                'asuransi' => $request->input('asuransi_cs'),
                'jenis_asuransi' => $request->input('jenis_asuransi_cs'),
                'jenis_pembelian' => $request->input('jenis_pembelian'),
                'tujuan_pembelian' => $request->input('tujuan_pembelian'),
                'tgl_jual' => $request->input('tgl_jual'),
            ];
            // dd($request->all());

            // Temukan entri di tabel Aktifitas berdasarkan aktifitas_id
            $aktifitas = Aktifitas::find($request->input('nopol_cash'));

            // Cek jika entri aktifitas ditemukan dan memiliki inventory_id
            if ($aktifitas && $aktifitas->inventory_id) {
                //perbarui status jd soldout (2)
                $inventory = inventory::find($aktifitas->inventory_id);
                if ($inventory) {
                     // Hapus gambar dari direktori
                    $imagePath = public_path('images') . '/' . $inventory->image;
                    if (file_exists($imagePath)) {
                        unlink($imagePath); // Hapus gambar dari direktori
                    }

                    $inventory->image = '';

                    $inventory->status = 2;
                    $inventory->save();
                }
            }

        } elseif ($jenis === 'Credit') {
            // Cari pengajuan berdasarkan aktifitas_id yang sama dengan nopol_cr
            $pengajuan = Pengajuan::where('aktifitas_id', $request->input('nopol_cr'))->first();

            if ($pengajuan) {
                // Jika pengajuan ditemukan, gunakan pengajuan_id yang sesuai
                $data = [
                    'aktifitas_id' => $request->input('nopol_cr'),
                    'pengajuan_id' => $pengajuan->id,
                    // 'no_spk' => $request->input('no_spk_cr'),
                    'no_spk' => str_replace(',', '', $request->input('no_spk_cr')),
                    // 'harga_mobil' => $request->input('harga_mobil_cr'),
                    'harga_mobil' => intval(str_replace(['.', ','], '', $request->input('harga_mobil_cr'))),
                    'asuransi' => $request->input('asuransi_cr'),
                    'jenis_asuransi' => $request->input('jenis_asuransi_cr'),
                    'jenis_pembelian' => $request->input('jenis_pembelian'),
                    'tujuan_pembelian' => $request->input('tujuan_pembelian'),
                    'tgl_jual' => $request->input('tgl_jual'),
                ];

                // Temukan entri di tabel Aktifitas berdasarkan aktifitas_id
                $aktifitas = Aktifitas::find($request->input('nopol_cr'));

                // Cek jika entri aktifitas ditemukan dan memiliki inventory_id
                if ($aktifitas && $aktifitas->inventory_id) {
                    //perbarui status jd soldout (2)
                    $inventory = inventory::find($aktifitas->inventory_id);
                    if ($inventory) {
                        $inventory->status = 2;
                        $inventory->save();
                    }
                }
            } else {
                // Handle jika pengajuan tidak ditemukan
                return redirect()->back()->with('error', 'Pengajuan tidak ditemukan.');
            }
        }

        $penjualan = Penjualan::create($data);

        // Redirect ke halaman yang sesuai
        return redirect()->route('penjualan.index');
    }

    // Count by Row
    public function viewExport(){

        // Mengambil data aktivitas dari database dan kelompokkan berdasarkan ID inventaris
        $activities = Aktifitas::all()->groupBy('inventory_id');

        // Inisialisasi array untuk menyimpan jumlah aktivitas berdasarkan kategori dan sumber prospek
        $activityData = [];

        // Loop untuk setiap inventaris
        foreach ($activities as $inventoryId => $inventoryActivities) {
            // Temukan data inventaris berdasarkan ID
            $inventory = Inventory::find($inventoryId);

            // Periksa apakah inventaris ditemukan
            if ($inventory) {
                // Ambil nomor polisi (nopol) dari inventaris
                $nopol = $inventory->nopol;
                $type = $inventory->type;
                $tahun = $inventory->tahun;

                // Inisialisasi array untuk inventaris tertentu
                $inventoryActivityData = [
                    'Nopol' => $nopol,
                    'Type' => $type,
                    'Tahun' => $tahun,
                    'Contacted' => ['Walk In' => 0, 'Marketplace' => 0, 'Web Trust' => 0,'Instagram' => 0, 'Database' => 0 , 'Referensi' => 0, 'OLX' => 0, 'Sales IC' => 0, 'Sales UC' => 0 ],
                    'Showroom Visit' => ['Walk In' => 0, 'Marketplace' => 0, 'Web Trust' => 0,'Instagram' => 0, 'Database' => 0, 'Referensi' => 0, 'OLX' => 0, 'Sales IC' => 0, 'Sales UC' => 0 ],
                    'Test Drive' => ['Walk In' => 0, 'Marketplace' => 0, 'Web Trust' => 0,'Instagram' => 0, 'Database' => 0, 'Referensi' => 0 , 'OLX' => 0, 'Sales IC' => 0, 'Sales UC' => 0],
                    'SPK' => ['Walk In' => 0, 'Marketplace' => 0, 'Web Trust' => 0,'Instagram' => 0, 'Database' => 0, 'Referensi' => 0 , 'OLX' => 0, 'Sales IC' => 0, 'Sales UC' => 0],
                ];

                // Loop untuk setiap aktivitas pada inventaris tertentu
                foreach ($inventoryActivities as $activity) {
                    // Update jumlah aktivitas berdasarkan kategori dan sumber prospek
                    switch ($activity->category) {
                        case 1:
                            $inventoryActivityData['Contacted'][$activity->sumber_prospek]++;
                            break;
                        case 2:
                            $inventoryActivityData['Showroom Visit'][$activity->sumber_prospek]++;
                            break;
                        case 3:
                            $inventoryActivityData['Test Drive'][$activity->sumber_prospek]++;
                            break;
                        case 4:
                            $inventoryActivityData['SPK'][$activity->sumber_prospek]++;
                            break;
                    }
                }

                // Masukkan data aktivitas inventaris ke dalam array utama
                $activityData[] = $inventoryActivityData;
            }
        }

        // Mengirimkan data ke view
        return view('backend.report.totalTenor', compact('activityData'));
    }

    public function view(){

        // // Ambil data dari input periode bulan awal dan bulan akhir
        // $startMonthYear = $request->input('startMonthYear');
        // $endMonthYear = $request->input('endMonthYear');

        // // Ubah format input menjadi objek Carbon untuk mempermudah pengolahan
        // $startDate = Carbon::createFromFormat('Y-m', $startMonthYear)->startOfMonth();
        // $endDate = Carbon::createFromFormat('Y-m', $endMonthYear)->endOfMonth();

        $data = [];
        $leasingData = [];


        // Loop untuk setiap bulan
        for ($month = 1; $month <= 12; $month++) {
        // for ($date = $startDate; $date->lte($endDate); $date->addMonth()) {
        //     $month = $date->month;
            // Penjualan UC
            $totalRs = Penjualan::whereMonth('created_at', $month)->count();
            $totalCredit = Penjualan::where('jenis_pembelian', 'Credit')->whereMonth('created_at', $month)->count();
            $totalCash = Penjualan::where('jenis_pembelian', 'Cash')->whereMonth('created_at', $month)->count();

            // Insurance
            $totalComprehensive = Penjualan::where('jenis_asuransi', 'Comprehensive')->whereMonth('created_at', $month)->count();
            $totalCombination = Penjualan::where('jenis_asuransi', 'Combination')->whereMonth('created_at', $month)->count();
            $totalTLO = Penjualan::where('jenis_asuransi', 'Total Loss ( TLO )')->whereMonth('created_at', $month)->count();

            // Dp Persen
            $total20 = Pengajuan::where('dp_persen','<', 20)->whereMonth('created_at', $month)->count();
            $total20to24 = Pengajuan::where('dp_persen', '>', 20)->where('dp_persen', '<=', 24)->whereMonth('created_at', $month)->count();
            $total25to29 = Pengajuan::where('dp_persen', '>=', 25)->where('dp_persen', '<=', 29)->whereMonth('created_at', $month)->count();
            $total30 = Pengajuan::where('dp_persen',  30)->whereMonth('created_at', $month)->count();
            $totalUp30 = Pengajuan::where('dp_persen', '>=' , 30)->whereMonth('created_at', $month)->count();
            $TotalCredit = Pengajuan::whereMonth('created_at',$month)->count();

            // Tenor
            $tenor6 = Pengajuan::whereIn('tenor', [5, 6])->whereMonth('created_at', $month)->count();
            $tenor1112 = Pengajuan::whereIn('tenor', [11, 12])->whereMonth('created_at', $month)->count();
            $tenor24 = Pengajuan::whereIn('tenor', [23, 24])->whereMonth('created_at', $month)->count();
            $tenor36 = Pengajuan::whereIn('tenor', [35, 36])->whereMonth('created_at', $month)->count();
            $tenor48 = Pengajuan::whereIn('tenor', [47, 48])->whereMonth('created_at', $month)->count();
            $tenor60 = Pengajuan::whereIn('tenor', [59, 60])->whereMonth('created_at', $month)->count();
            $TotalCreditTenor = Pengajuan::whereMonth('created_at', $month)->count();

            // Masukkan data ke dalam array
            $data[$month] = [
                'RS' => $totalRs,
                'Credit' => $totalCredit,
                'Cash' => $totalCash,
                'Comprehensive' => $totalComprehensive,
                'Combination' => $totalCombination,
                'TLO' => $totalTLO,

                // Dp Persen
                'DP 20' => $total20,
                'DP 20-24' => $total20to24,
                'DP 25-29' => $total25to29,
                'DP 30' => $total30,
                'DP up 30' => $totalUp30,
                'TotalCredit' => $TotalCredit,

                // Tenor
                'Tenor 6' => $tenor6,
                'Tenor1112' => $tenor1112,
                'Tenor24' => $tenor24,
                'Tenor36' => $tenor36,
                'Tenor48' => $tenor48,
                'Tenor60' => $tenor60,
                'TotalCreditTenor' => $TotalCreditTenor

            ];

            // Penjualan Leasing
            $leasings = ['MTF', 'Maybank', 'ACC','OTO MULTIARTHA','TAF','ADIRA','BCA FINANCE','BFI FINANCE','BRI FINANCE','CLIPAN FINANCE']; // Misalnya Anda memiliki 3 leasing
                // Loop untuk setiap leasing
                foreach ($leasings as $leasing) {
                    // Hitung total penjualan untuk setiap leasing dan bulan
                    $totalLeasing = Pengajuan::where('leasing', $leasing)
                        ->whereMonth('created_at', $month)
                        ->count();

                    // Masukkan data penjualan dari leasing ke dalam array
                    if (!isset($leasingData[$leasing])) {
                        $leasingData[$leasing] = [];
                    }
                    $leasingData[$leasing][$month] = $totalLeasing;
            }

            // Penjualan Leasing Application In
            $leasingsIn = ['MTF', 'Maybank', 'ACC','OTO MULTIARTHA','TAF','ADIRA','BCA FINANCE','BFI FINANCE','BRI FINANCE','CLIPAN FINANCE']; // Misalnya Anda memiliki 3 leasing
                // Loop untuk setiap leasing
                foreach ($leasingsIn as $leasing) {
                    // Hitung total penjualan untuk setiap leasing dan bulan
                    $totalLeasing = Pengajuan::where('leasing', $leasing)
                        ->where('status', 1)
                        ->whereMonth('created_at', $month)
                        ->count();

                    // Masukkan data penjualan dari leasing ke dalam array
                    if (!isset($leasingData[$leasing])) {
                        $leasingData[$leasing] = [];
                    }
                    $leasingData[$leasing][$month] = $totalLeasing;
            }

            // Penjualan Leasing Application Reject
            $leasingsReject = ['MTF', 'Maybank', 'ACC','OTO MULTIARTHA','TAF','ADIRA','BCA FINANCE','BFI FINANCE','BRI FINANCE','CLIPAN FINANCE']; // Misalnya Anda memiliki 3 leasing
                // Loop untuk setiap leasing
                foreach ($leasingsReject as $leasing) {
                    // Hitung total penjualan untuk setiap leasing dan bulan
                    $totalLeasingReject = Pengajuan::where('leasing', $leasing)
                        ->where('status', 2)
                        ->whereMonth('created_at', $month)
                        ->count();

                    // Masukkan data penjualan dari leasing ke dalam array
                    if (!isset($leasingDataReject[$leasing])) {
                        $leasingDataReject[$leasing] = [];
                    }
                    $leasingDataReject[$leasing][$month] = $totalLeasingReject;
            }

        }

        // Hitung total untuk masing-masing jenis penjualan
        $totalRs = Penjualan::count();
        $totalCredit = Penjualan::where('jenis_pembelian', 'Credit')->count();
        $totalCash = Penjualan::where('jenis_pembelian', 'Cash')->count();
        $totalComprehensive = Penjualan::where('jenis_asuransi', 'Comprehensive')->count();
        $totalCombination = Penjualan::where('jenis_asuransi', 'Combination')->count();
        $totalTLO = Penjualan::where('jenis_asuransi', 'Total Loss ( TLO )')->count();

        // Dp Persen
        $totalCredit = Pengajuan::all()->count();
        $total20 = Pengajuan::where('dp_persen' , '<=', 20)->count();
        $total20to24 = Pengajuan::where('dp_persen', '>=', 20)->where('dp_persen', '<=', 24)->count();
        $total25to29 = Pengajuan::where('dp_persen', '>=', 25)->where('dp_persen', '<=', 29)->count();
        $total30 = Pengajuan::where('dp_persen', 30)->count();
        $totalUp30 = Pengajuan::where('dp_persen', '>=' , 30)->count();

        // Tenor
        $tenor6 = Pengajuan::whereIn('tenor', [5, 6])->count();
        $tenor1112 = Pengajuan::whereIn('tenor', [11, 12])->count();
        $tenor24 = Pengajuan::whereIn('tenor', [23, 24])->count();
        $tenor36 = Pengajuan::whereIn('tenor', [35, 36])->count();
        $tenor48 = Pengajuan::whereIn('tenor', [47, 48])->count();
        $tenor60 = Pengajuan::whereIn('tenor', [59, 60])->count();
        $totalCreditTenor = Pengajuan::all()->count();

        // Leasing Reject


        return view('backend.report.all', [
            'data' => $data,
            'totalRs' => $totalRs,
            'totalCredit' => $totalCredit,
            'totalCash' => $totalCash,
            'totalComprehensive' => $totalComprehensive,
            'totalCombination' => $totalCombination,
            'totalTLO' => $totalTLO,
            'leasingData' => $leasingData,

            // DP Persen
            'totalCredit' => $totalCredit,
            'total20' => $total20,
            'total20to24' => $total20to24,
            'total25to29' => $total25to29,
            'total30' => $total30,
            'totalUp30' => $totalUp30,

            // Tenor
            'totalCreditTenor' => $totalCreditTenor,
            'tenor6' => $tenor6,
            'tenor24' => $tenor24,
            'tenor36' => $tenor36,
            'tenor48' => $tenor48,
            'tenor60' => $tenor60,
            'tenor1112' => $tenor1112,

            // Leasing Reject
            'leasings' => $leasings,
            'leasingsIn' => $leasingsIn,
            'leasingsReject' => $leasingsReject,
            'leasingData' => $leasingData,

            'leasingDataReject' => $leasingDataReject,

        ]);
    }

    public function export_all()
    {
        return Excel::download(new AllExportUc, 'Report All UC.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }

    public function view_export(){
        return view('backend.report.viewReport');
    }

    public function report(){
        return view('backend.report.viewReport');
    }

}
