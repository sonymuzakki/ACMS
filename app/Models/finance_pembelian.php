<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class finance_pembelian extends Model
{
    // use HasFactory;

    protected $guarded = [];
    protected $table = 'finance_pembelian';
    protected $primaryKey = 'id';
    public $incrementing = false;

    public function finance_pembelian_detail()
    {
        return $this->hasMany(finance_pembelian_detail::class, 'pembelian_id', 'id');
    }

    public function master_supplier()
    {
        return $this->belongsTo(MasterSupplier::class, 'supplier_id', 'id');
    }
    public function master_bayar()
    {
        return $this->belongsTo(Pembayaran::class, 'pembayaran_id', 'id');
    }
}
