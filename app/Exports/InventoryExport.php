<?php

namespace App\Exports;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class InventoryExport implements FromCollection, WithHeadings, WithMapping
{
    protected $startMonth;
    protected $endMonth;

    public function __construct($startMonth, $endMonth)
    {
        $this->startMonth = $startMonth;
        $this->endMonth = $endMonth;
    }

    public function collection()
    {
        $query = DB::table('inventory')
            ->leftJoin('aktifitas', 'aktifitas.inventory_id', '=', 'inventory.id')
            ->leftJoin('pengajuan', 'pengajuan.aktifitas_id', '=', 'aktifitas.id')
            ->leftJoin('penjualan', 'penjualan.aktifitas_id', '=', 'aktifitas.id')
            ->leftJoin('merk', 'merk.id', '=', 'inventory.merk_id')
            ->select('inventory.*', 'penjualan.tgl_jual', 'aktifitas.nama_customer', 'penjualan.jenis_pembelian', 'merk.nama as merk');

        if ($this->startMonth && $this->endMonth) {
            $startDate = Carbon::parse($this->startMonth)->startOfMonth();
            $endDate = Carbon::parse($this->endMonth)->endOfMonth();
            $query->whereBetween('inventory.tgl_beli', [$startDate, $endDate]);
        }

        return $query->get()->unique('nopol');
    }

    public function map($row): array
    {
        // Tentukan deskripsi status
        $statusDescription = $row->status == '2' ? 'Terjual' : ($row->status == '1' ? 'Proses' : 'Available');

        // Hitung usia stock
        $usiaStock = $row->status == '2'
            ? Carbon::parse($row->tgl_jual)->diffInDays(Carbon::parse($row->tgl_beli)) : Carbon::now()->diffInDays(Carbon::parse($row->tgl_beli));

        // Jika status bukan '2', tampilkan usia stock sebagai negatif
        $usiaStock = $row->status != '2' ? $usiaStock * 1 : $usiaStock;

        // Mendapatkan indeks (nomor urut) baris
        static $index = 1;

        return [
            $index++, // Menampilkan nomor urut
            $row->tgl_beli,
            $row->penjual,
            $row->spv,
            $row->sales,
            $row->keterangan,
            $row->type,
            $row->nopol,
            $row->no_rangka,
            $row->km,
            $row->harga_beli,
            $row->komisi,
            $row->merk,
            $row->model,
            $row->transmisi,
            $row->warna,
            $row->tahun,
            $row->tgl_jual,
            $row->nama_customer,
            $row->jenis_pembelian,
            $row->harga_jual,
            $statusDescription,
            $row->grade,
            $row->simulasi,
            $row->leasing,
            $row->dp_setor,
            $row->angsuran,
            $row->tenor,
            $usiaStock
        ];
    }

    public function headings(): array
    {
        return [
            'No', 'Tgl Beli', 'Penjual', 'SPV', 'Sales', 'Keterangan', 'Type',
            'No Polisi', 'No Rangka', 'KM', 'Harga Beli', 'Komisi',
            'Merk', 'Model', 'Transmisi', 'Warna', 'Tahun', 'Tgl Jual',
            'Nama Customer', 'Jenis Pembelian', 'Harga Jual', 'Status',
            'Grade', 'Simulasi', 'Leasing', 'DP Setor', 'Angsuran',
            'Tenor', 'Usia Stock'
        ];
    }
}
