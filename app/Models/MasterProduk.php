<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterProduk extends Model
{
    protected $table = 'master_produk';
    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(MasterKategori::class, 'kategori_id','id');
    }

    public function satuan()
    {
        return $this->belongsTo(MasterSatuan::class, 'satuan_id','id');
    }

}
