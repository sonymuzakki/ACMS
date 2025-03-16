<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Inventory;
use App\Models\ProspekBeli;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Appraisal implements FromView
{
    protected $monthYear;

    public function __construct($monthYear)
    {
        $this->monthYear = $monthYear;
    }

    public function view(): View
    {
        $monthYear = $this->monthYear;

        // Define intervals for the month
        $intervals = [
            ['start' => 1, 'end' => 7],
            ['start' => 8, 'end' => 14],
            ['start' => 15, 'end' => 21],
            ['start' => 22, 'end' => 28],
            ['start' => 29, 'end' => Carbon::createFromFormat('Y-m', $monthYear)->endOfMonth()->day]
        ];

        $appraisal = [];
        $totalAppr = 0;

        foreach ($intervals as $interval) {
            $start_date = Carbon::createFromFormat('Y-m-d', "$monthYear-" . str_pad($interval['start'], 2, '0', STR_PAD_LEFT))->startOfDay();
            $end_date = Carbon::createFromFormat('Y-m-d', "$monthYear-" . str_pad($interval['end'], 2, '0', STR_PAD_LEFT))->endOfDay();

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
            $start_date = Carbon::createFromFormat('Y-m-d', "$monthYear-" . str_pad($interval['start'], 2, '0', STR_PAD_LEFT))->startOfDay();
            $end_date = Carbon::createFromFormat('Y-m-d', "$monthYear-" . str_pad($interval['end'], 2, '0', STR_PAD_LEFT))->endOfDay();

            $intervalTotal = Inventory::where('keterangan', 'Trade In')
                ->whereHas('aktifitas.penjualan', function ($query) use ($start_date, $end_date) {
                    $query->whereBetween('tgl_jual', [$start_date, $end_date]);
                })
                ->count();

            $jualTrade[] = [
                'start' => $start_date->format('Y-m-d'),
                'end' => $end_date->format('Y-m-d'),
                'total' => $intervalTotal
            ];

            $totalJualTrade += $intervalTotal;
        }

        $beliTrade = [];
        $totalBeliTrade = 0;

        foreach ($intervals as $interval) {
            $start_date = Carbon::createFromFormat('Y-m-d', "$monthYear-" . str_pad($interval['start'], 2, '0', STR_PAD_LEFT))->startOfDay();
            $end_date = Carbon::createFromFormat('Y-m-d', "$monthYear-" . str_pad($interval['end'], 2, '0', STR_PAD_LEFT))->endOfDay();

            $intervalTotal = Inventory::where('keterangan', 'Trade In')
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
            $start_date = Carbon::createFromFormat('Y-m-d', "$monthYear-" . str_pad($interval['start'], 2, '0', STR_PAD_LEFT))->startOfDay();
            $end_date = Carbon::createFromFormat('Y-m-d', "$monthYear-" . str_pad($interval['end'], 2, '0', STR_PAD_LEFT))->endOfDay();

            $intervalTotal = Inventory::where('keterangan', 'Direct')
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
            $start_date = Carbon::createFromFormat('Y-m-d', "$monthYear-" . str_pad($interval['start'], 2, '0', STR_PAD_LEFT))->startOfDay();
            $end_date = Carbon::createFromFormat('Y-m-d', "$monthYear-" . str_pad($interval['end'], 2, '0', STR_PAD_LEFT))->endOfDay();

            $intervalTotal = Inventory::where('keterangan', 'Direct')
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
            $start_date = Carbon::createFromFormat('Y-m-d', "$monthYear-" . str_pad($interval['start'], 2, '0', STR_PAD_LEFT))->startOfDay();
            $end_date = Carbon::createFromFormat('Y-m-d', "$monthYear-" . str_pad($interval['end'], 2, '0', STR_PAD_LEFT))->endOfDay();

            $intervalTotal = Inventory::where('keterangan', 'Titipan Direksi')
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
            $start_date = Carbon::createFromFormat('Y-m-d', "$monthYear-" . str_pad($interval['start'], 2, '0', STR_PAD_LEFT))->startOfDay();
            $end_date = Carbon::createFromFormat('Y-m-d', "$monthYear-" . str_pad($interval['end'], 2, '0', STR_PAD_LEFT))->endOfDay();

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

        return view('backend.report.appraisal', [
            'monthYear' => $this->monthYear,
            'intervals' => $intervals,
            'appraisal' => $appraisal,
            'totalAppr' => $totalAppr,
            'jualTrade' => $jualTrade,
            'totalJualTrade' => $totalJualTrade,
            'beliTrade' => $beliTrade,
            'totalBeliTrade' => $totalBeliTrade,
            'jualDirect' => $jualDirect,
            'totalJualDirect' => $totalJualDirect,
            'beliDirect' => $beliDirect,
            'totalBeliDirect' => $totalBeliDirect,
            'jualDireksi' => $jualDireksi,
            'totalJualDireksi' => $totalJualDireksi,
            'beliDireksi' => $beliDireksi,
            'totalBeliDireksi' => $totalBeliDireksi,
        ]);
    }
}
