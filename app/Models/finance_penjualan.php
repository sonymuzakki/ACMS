<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class finance_penjualan extends Model
{
    protected $guarded = [];
    protected $table = 'finance_penjualan';
    protected $primaryKey = 'id';
    public $incrementing = false;

    public function finance_penjualan_detail()
    {
        return $this->hasMany(finance_penjualan_detail::class, 'penjualan_id', 'id');
    }

    public function MasterSupplier()
    {
        return $this->belongsTo(MasterSupplier::class, 'supplier_id', 'id');
    }

    public function MasterBank()
    {
        return $this->belongsTo(MasterBank::class, 'pembayaran_id', 'id');
    }

    public function MasterProduk()
    {
        return $this->belongsTo(MasterProduk::class, 'produk_id','id');
    }
}
