<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class finance_pembelian extends Model
{
    protected $guarded = [];
    protected $table = 'finance_pembelian';
    protected $primaryKey = 'id';
    public $incrementing = false;

    public function finance_pembelian_detail()
    {
        return $this->hasMany(finance_pembelian_detail::class, 'pembelian_id', 'id');
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
