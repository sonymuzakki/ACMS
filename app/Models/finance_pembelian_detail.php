<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class finance_pembelian_detail extends Model
{
    // use HasFactory;
    protected $guarded = "";
    protected $table = 'finance_pembelian_detail';
    protected $primaryKey = 'id';
    public $incrementing = false;

    public function finance_pembelian()
    {
        return $this->belongsTo(finance_pembelian::class, 'pembelian_id', 'id');
    }
    public function Barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $date = now()->format('Ymd');
            $lastId = DB::table('finance_detail_pengeluaran')
                // ->where('id','Like',"PB{$date}&")
                ->where('id', 'LIKE', "PB{$date}%")
                ->max('id');

            // $counter = $lastId ? (int) substr($lastId, 4) + 1 : 1;
            $counter = $lastId ? (int) substr($lastId, -4) + 1 : 1;

            $model->id = "PB{$date}". str_pad($counter, 4, '0', STR_PAD_LEFT);
        });

    }
}
