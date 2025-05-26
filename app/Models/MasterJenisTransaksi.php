<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterJenisTransaksi extends Model
{
    use HasFactory;

    protected $table = 'master_jenis_transaksi';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(MasterKategori::class, 'kategori_id','id');
    }
}
