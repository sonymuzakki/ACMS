<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktifitas extends Model
{
    protected $table = 'aktifitas';
    protected $guarded = [];

    public function inventory()
    {
        return $this->belongsTo(inventory::class, 'inventory_id', 'id');
    }

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'aktifitas_id');
    }

}
