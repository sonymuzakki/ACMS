<?php
namespace App\Exports;

use App\Models\Inventory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StockBeliExport implements FromCollection, WithHeadings , WithMapping , ShouldAutoSize
// {
//     protected $startDate;
//     protected $endDate;
//     protected $exportOption;
//     protected $rowNumber;

//     public function __construct($startDate,$endDate,$exportOption)
//     {
//         $this->startDate = $startDate;
//         $this->endDate = $endDate;
//         $this->exportOption = $exportOption;
//         $this->rowNumber = 0;
//     }

//     public function collection()
//     {
//         $query = inventory::query();

//         if ($this->exportOption === 'option5' && $this->startDate && $this->endDate) {
//             $query->whereBetween('created_at', [$this->startDate, $this->endDate]);
//         }
//     }

//     public function headings(): array
//     {
//         return [
//             'ID',
//             'Type',
//             'Nopol',
//             'KM',
//             'No Rangka',
//             'Merk ID',
//             'Model',
//             'Warna',
//             'Tahun',
//             'Transmisi',
//             'Tanggal Beli',
//             'Penjual',
//             'Harga Beli',
//             'Harga Jual',
//             'Status',
//             'Sales',
//             'SPV',
//             'Jenis Pembelian',
//             'Nama Customer',
//             'Komisi',
//             'Keterangan',
//             'Grade',
//             'Image',
//             'Simulasi',
//             'Leasing',
//             'DP Setor',
//             'Angsuran',
//             'Tenor',
//             'Created At',
//             'Updated At'
//         ];
//     }

//     public function map($inventory): array
//     {
//         $this->rowNumber++;
//         // Mapping status
//         $statusMapping = [
//             0 => 'available',
//             1 => 'proses',
//             2 => 'terjual',
//         ];

//         return [
//             $this->rowNumber,
//             $inventory->type,
//             $inventory->nopol,
//             $inventory->km,
//             $inventory->no_rangka,
//             $inventory->merk ? $inventory->merk->name : '',
//             $inventory->model,
//             $inventory->warna,
//             $inventory->tahun,
//             $inventory->transmisi,
//             $inventory->tgl_beli,
//             $inventory->penjual,
//             $inventory->harga_beli,
//             $inventory->harga_jual,
//             // $inventory->status,
//             $statusMapping[$inventory->status] ?? '-',
//             $inventory->sales,
//             $inventory->spv,
//             $inventory->jenis_pembelian,
//             $inventory->nama_customer,
//             $inventory->komisi,
//             $inventory->keterangan,
//             $inventory->grade,
//             $inventory->image,
//             $inventory->simulasi,
//             $inventory->leasing,
//             $inventory->dp_setor,
//             $inventory->angsuran,
//             $inventory->tenor,
//             $inventory->created_at,
//             $inventory->updated_at
//         ];
//     }
// }
{
    protected $startDate;
    protected $endDate;
    protected $exportOption;
    protected $rowNumber;

    public function __construct($startDate, $endDate, $exportOption)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->exportOption = $exportOption;
        $this->rowNumber = 0;
    }

    public function collection()
    {
        // Start with a base query
        $query = Inventory::query();

        // Apply filters based on export option
        if ($this->exportOption === 'option5' && $this->startDate && $this->endDate) {
            // Convert start and end dates to Carbon instances for proper comparison
            $startDate = Carbon::parse($this->startDate)->startOfMonth();
            $endDate = Carbon::parse($this->endDate)->endOfMonth();

            // Apply date range filter on 'tgl_beli' column
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        // Return the query result set
        return $query->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Timestamp',
            'Nopol',
            'Type',
            'KM',
            'No Rangka',
            'Merk ID',
            'Model',
            'Warna',
            'Tahun',
            'Transmisi',
            'Tanggal Beli',
            'Penjual',
            'Harga Beli',
            'Harga Jual',

            'Sales',
            'SPV',
            'Jenis Pembelian',
            'Nama Customer',
            'Komisi',
            'Keterangan',
            'Grade',
            'Image',
            'Simulasi',
            'Leasing',
            'DP Setor',
            'Angsuran',
            'Tenor',
            'Status',
            // 'Created At',
            // 'Updated At'
        ];
    }

    public function map($inventory): array
    {
        $this->rowNumber++;
        // Mapping status
        $statusMapping = [
            0 => 'Available',
            1 => 'Proses',
            2 => 'Terjual',
        ];

        return [
            $this->rowNumber,
            $inventory->created_at,
            $inventory->nopol,
            $inventory->type,
            $inventory->km,
            $inventory->no_rangka,
            $inventory->merk ? $inventory->merk->name : '',
            $inventory->model,
            $inventory->warna,
            $inventory->tahun,
            $inventory->transmisi,
            $inventory->tgl_beli,
            $inventory->penjual,
            $inventory->harga_beli,
            $inventory->harga_jual,
            $inventory->sales,
            $inventory->spv,
            $inventory->jenis_pembelian,
            $inventory->nama_customer,
            $inventory->komisi,
            $inventory->keterangan,
            $inventory->grade,
            $inventory->image,
            $inventory->simulasi,
            $inventory->leasing,
            $inventory->dp_setor,
            $inventory->angsuran,
            $inventory->tenor,
            isset($statusMapping[$inventory->status]) ? $statusMapping[$inventory->status] : '-',
            // $inventory->created_at,
            // $inventory->updated_at
        ];
    }
}
