<?php
namespace App\Helpers;

use App\Models\finance_pembelian_detail;

class StokHelper
{
    public static function ambilHargaBeliFIFO($produkId, $qtyDibutuhkan) {
        $sisaQty = $qtyDibutuhkan;
        $result = [];

        $stokMasuk = finance_pembelian_detail::where('produk_id', $produkId)
            ->whereRaw('qty > qty_terpakai')
            ->orderBy('id', 'asc') // FIFO
            ->get();

        foreach ($stokMasuk as $detail) {
            $tersedia = $detail->qty - $detail->qty_terpakai;

            if ($tersedia <= 0) continue;

            $ambil = min($sisaQty, $tersedia);
            $result[] = [
                'pembelian_detail_id' => $detail->id,
                'qty' => $ambil,
                'harga_beli' => $detail->harga_beli,
            ];

            $detail->qty_terpakai += $ambil;
            $detail->save();

            $sisaQty -= $ambil;
            if ($sisaQty <= 0) break;
        }

        return $result;
    }

}
