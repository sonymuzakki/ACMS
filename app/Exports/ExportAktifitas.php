<?php

namespace App\Exports;

use App\Models\Aktifitas;
use App\Models\inventory;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportAktifitas implements FromView, ShouldAutoSize
{

    public function view(): View
    {
        // Mendapatkan bulan dan tahun dari permintaan
        $monthYear = request()->input('month');

        // Mendapatkan data aktivitas dari database dan kelompokkan berdasarkan ID inventaris
        $activities = Aktifitas::whereYear('created_at', '=', date('Y', strtotime($monthYear)))
                                ->whereMonth('created_at', '=', date('m', strtotime($monthYear)))
                                ->get()
                                ->groupBy('inventory_id');

        // Inisialisasi array untuk menyimpan jumlah aktivitas berdasarkan kategori dan sumber prospek
        $activityData = [];

        // Loop untuk setiap inventaris
        foreach ($activities as $inventoryId => $inventoryActivities) {
            // Temukan data inventaris berdasarkan ID
            $inventory = inventory::find($inventoryId);

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
                    'Contacted' => ['Walk In' => 0, 'Marketplace' => 0, 'Web Trust' => 0, 'Instagram' => 0, 'Database' => 0 , 'Referensi' => 0, 'OLX' => 0, 'Sales IC' => 0, 'Sales UC' => 0 ],
                    'Showroom Visit' => ['Walk In' => 0, 'Marketplace' => 0, 'Web Trust' => 0, 'Instagram' => 0, 'Database' => 0, 'Referensi' => 0, 'OLX' => 0, 'Sales IC' => 0, 'Sales UC' => 0 ],
                    'Test Drive' => ['Walk In' => 0, 'Marketplace' => 0, 'Web Trust' => 0, 'Instagram' => 0, 'Database' => 0, 'Referensi' => 0 , 'OLX' => 0, 'Sales IC' => 0, 'Sales UC' => 0],
                    'SPK' => ['Walk In' => 0, 'Marketplace' => 0, 'Web Trust' => 0, 'Instagram' => 0, 'Database' => 0, 'Referensi' => 0 , 'OLX' => 0, 'Sales IC' => 0, 'Sales UC' => 0],
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
}
