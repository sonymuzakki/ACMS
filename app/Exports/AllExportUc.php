<?php

namespace App\Exports;

use App\Models\Pengajuan;
use App\Models\Penjualan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AllExportUc implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        $data = [];
        $leasingData = [];
        $asuransiData = [];
        $asuransi = ['AAB', 'ABDA', 'MSIG','MAG','RAMAYANA','ZURICH'];

        // Loop untuk setiap bulan
        for ($month = 1; $month <= 12; $month++) {
            // Penjualan UC
            $totalRs = Penjualan::whereMonth('created_at', $month)->count();
            $totalCredit = Penjualan::where('jenis_pembelian', 'Credit')->whereMonth('created_at', $month)->count();
            $totalCash = Penjualan::where('jenis_pembelian', 'Cash')->whereMonth('created_at', $month)->count();

            $totalCreditReject = Pengajuan::where('status',2)->whereMonth('created_at', $month)->count();

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

            $TotalCreditAll = Pengajuan::where('status',1)->whereMonth('created_at', $month)->count();

            $TotalAsuransi = Penjualan::where('asuransi', ['AAB', 'ABDA', 'MSIG','MAG','RAMAYANA','ZURICH'])->whereMonth('created_at', $month)->count();

            // $totalAsuransi = Penjualan::where('asuransi', $asuransi)->whereMonth('created_at', $month)->count();

            // Masukkan data ke dalam array
            $data[$month] = [
                'RS' => $totalRs,
                'Credit' => $totalCredit,
                'CreditReject' => $totalCreditReject,
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
                'totalAsuransi' => $TotalAsuransi,

                // Tenor
                'Tenor 6' => $tenor6,
                'Tenor1112' => $tenor1112,
                'Tenor24' => $tenor24,
                'Tenor36' => $tenor36,
                'Tenor48' => $tenor48,
                'Tenor60' => $tenor60,
                'TotalCreditTenor' => $TotalCreditTenor,

                'TotalCreditAll' => $TotalCreditAll,

            ];

            // Penjualan Leasing
            $leasings = ['MTF', 'Maybank', 'ACC','OTO MULTIARTHA','TAF','ADIRA','BCA FINANCE','BFI SHARIA','BRI FINANCE','CLIPAN FINANCE']; // Misalnya Anda memiliki 3 leasing
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
            $leasingsIn = ['MTF', 'Maybank', 'ACC','OTO MULTIARTHA','TAF','ADIRA','BCA FINANCE','BFI SHARIA','BRI FINANCE','CLIPAN FINANCE']; // Misalnya Anda memiliki 3 leasing
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
            $totalCreditReject = Pengajuan::where('status', 2)->whereMonth('created_at', $month)->count();
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

            // // Asuransi
            // $asuransi = ['AAB', 'ABDA', 'MSIG','MAG','RAMAYANA','ZURICH'];
            //     // Loop untuk setiap leasing
            //     foreach ($asuransi as $leasing) {
            //         // Hitung total penjualan untuk setiap leasing dan bulan
            //         $totalAsuransi = Penjualan::where('asuransi', $asuransi)
            //             ->whereMonth('created_at', $month)
            //             ->count();

            //         // Masukkan data penjualan dari leasing ke dalam array
            //         if (!isset($asuransiData[$leasing])) {
            //             $asuransiData[$leasing] = [];
            //         }
            //         $asuransiData[$leasing][$month] = $totalAsuransi;
            // }

            // // Penjualan Leasing
            // $leasings = ['MTF', 'Maybank', 'ACC','OTO MULTIARTHA','TAF','ADIRA','BCA FINANCE','BFI SHARIA','BRI FINANCE','CLIPAN FINANCE']; // Misalnya Anda memiliki 3 leasing

            // // Loop untuk setiap leasing
            //     foreach ($leasings as $leasing) {
            //         // Hitung total penjualan untuk setiap leasing dan bulan
            //         $totalLeasing = Pengajuan::where('leasing', $leasing)
            //             ->whereMonth('created_at', $month)
            //             ->count();

            //         // Masukkan data penjualan dari leasing ke dalam array
            //         if (!isset($leasingData[$leasing])) {
            //             $leasingData[$leasing] = [];
            //         }
            //         $leasingData[$leasing][$month] = $totalLeasing;
            // }

            $asuransi = ['AAB', 'ABDA', 'MSIG','MAG','RAMAYANA','ZURICH'];
            // Loop untuk setiap leasing
            foreach ($asuransi as $leasing) {
                // Hitung total penjualan untuk setiap leasing dan bulan
                $totalAsuransi = Penjualan::where('asuransi', $leasing)
                    ->whereMonth('created_at', $month)
                    ->count();

                // Masukkan data penjualan dari leasing ke dalam array
                if (!isset($asuransiData[$leasing])) {
                    $asuransiData[$leasing] = [];
                }
                $asuransiData[$leasing][$month] = $totalAsuransi;
            }

        }

        // Hitung total untuk masing-masing jenis penjualan
        $totalRs = Penjualan::count();
        $totalCredit = Penjualan::where('jenis_pembelian', 'Credit')->count();
        $totalCreditReject = Pengajuan::where('status', 2)->count();
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

        $totalCreditAll = Pengajuan::where('status',1)->count();

        // Asuransi
        $totalCreditAsuransi = Penjualan::whereIn('asuransi', ['AAB', 'ABDA', 'MSIG','MAG','RAMAYANA','ZURICH'])->count();


        return view('backend.report.all', [
            'data' => $data,
            'totalRs' => $totalRs,
            'totalCredit' => $totalCredit,
            'totalCreditReject' => $totalCreditReject,
            'totalCash' => $totalCash,
            'totalComprehensive' => $totalComprehensive,
            'totalCombination' => $totalCombination,
            'totalTLO' => $totalTLO,
            'leasingData' => $leasingData,

            // Credit
            'totalCreditAll' => $totalCreditAll,

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


            // Asuransi
            'asuransi' => $asuransiData,
            'asuransiData' => $asuransiData,
            'totalCreditAsuransi' => $totalCreditAsuransi,
            'totalAsuransi' => $totalAsuransi,

        ]);
    }
}
