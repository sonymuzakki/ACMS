<?php

namespace App\Exports;

use App\Models\ProspekBeli;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Carbon\Carbon;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ProspekBeliExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    use Exportable;

    // protected $startDate;
    // protected $exportOption;

    // public function __construct($startDate, $exportOption)
    // {
    //     $this->startDate = $startDate;
    //     $this->exportOption = $exportOption;
    // }

    // /**
    //  * @return \Illuminate\Support\Collection
    //  */
    // public function collection()
    // {
    //     $query = ProspekBeli::query();

    //     if ($this->exportOption === 'option3' && $this->startDate) {
    //         $startDate = Carbon::parse($this->startDate)->startOfMonth();
    //         $endDate = $startDate->copy()->endOfMonth();
    //         $query->whereBetween('created_at', [$startDate, $endDate]);
    //     }

    //     return $query->get();
    // }

    // protected $month;

    // public function __construct($month)
    // {
    //     $this->month = $month;
    // }

    // public function collection()
    // {
    //     $monthYear = request()->input('monthYear');

    //     // Mendapatkan data aktivitas dari database dan kelompokkan berdasarkan ID inventaris
    //     $activities = ProspekBeli::whereYear('created_at', '=', date('Y', strtotime($monthYear)))
    //         ->whereMonth('created_at', '=', date('m', strtotime($monthYear)))
    //         ->get();
    // }

    // public function collection()
    // {
    //     $query = ProspekBeli::query();

    //     if ($this->month) {
    //         $startDate = Carbon::parse($this->month)->startOfMonth();
    //         $endDate = Carbon::parse($this->month)->endOfMonth();
    //         $query->where('created_at', [$startDate, $endDate]);
    //     }

    //     return $query->get();
    // }

    protected $month;

    public function __construct($month)
    {
        $this->month = $month;
    }

    public function collection()
    {
        $query = ProspekBeli::query();

        if ($this->month) {
            $startDate = Carbon::parse($this->month)->startOfMonth();
            $endDate = Carbon::parse($this->month)->endOfMonth();
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        return $query->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Timestamp',
            'Tanggal',
            'Asal Prospek',
            'Pemilik Prospek',
            'Supervisor',
            'Merk Mobil Bekas',
            'Type Mobil Bekas',
            'Tahun',
            'Nomor Polisi',
            'Tanya Harga',
            'Nego Harga',
            'Lihat Unit',
            'Foto Depan',
            'Foto Kiri',
            'Foto Kanan',
            'Foto Belakang',
            'KM',
            'Kondisi Unit',
            'Kondisi Pajak',
            'Jika Pajak mati, berapa tahun',
            'Ambil Unit ?',
            'Harga Closing',
            'Waktu Appraisal',
            'Alasan tidak closing',
            'Customer Trade - In ?',
            'Kriteria Customer',
            'Unit Baru',
            'Kategori Prospek',
        ];
    }

    /**
     * @param $prospekBeli
     * @return array
     */
    public function map($prospekBeli): array
    {
        $salesName = $prospekBeli->sales ? $prospekBeli->sales : ($prospekBeli->nama_pic ?: '-');

        return [
            Date::PHPToExcel(Carbon::parse($prospekBeli->created_at)), // Convert timestamp to Excel date format
            $prospekBeli->tanggal,
            $prospekBeli->pic,
            $salesName,
            $prospekBeli->spv ?: '-',
            $prospekBeli->merk ? $prospekBeli->merk->nama : '',
            $prospekBeli->type,
            $prospekBeli->tahun,
            $prospekBeli->nopol,
            $prospekBeli->harga,
            $prospekBeli->nego_harga,
            $prospekBeli->lihat_unit,
            $prospekBeli->foto_depan,
            $prospekBeli->foto_kiri,
            $prospekBeli->foto_kanan,
            $prospekBeli->foto_belakang,
            $prospekBeli->km,
            $prospekBeli->kondisi_unit,
            $prospekBeli->kondisi_pajak,
            $prospekBeli->bulan_pajak,
            $prospekBeli->ambil_unit,
            $prospekBeli->closing_harga,
            $prospekBeli->waktu_appraisal,
            $prospekBeli->alasan,
            $prospekBeli->trade_in,
            // $tradeInKriteria,
            $prospekBeli->trade_in_kriteria,
            $prospekBeli->jenis ? $prospekBeli->jenis->nama : '',
            $prospekBeli->kategori_prospek,
        ];
    }

    /**
     * Check if a string is a serialized array
     *
     * @param string $string
     * @return bool
     */
    private function isSerialized($string): bool
    {
        return (@unserialize($string) !== false || $string === 'b:0;');
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('A2:A1000') // Adjust the range as needed
                    ->getNumberFormat()
                    ->setFormatCode(NumberFormat::FORMAT_DATE_YYYYMMDD2);
            },
        ];
    }
}
