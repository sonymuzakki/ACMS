<?php

namespace App\Models;

use App\Models\divisi;
use App\Models\lokasi;
use App\Models\LaporanUsers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class inventory extends Model
{
    use HasFactory;

    protected $table = 'inventory';
    protected $guarded;

    public function merk()
    {
        return $this->belongsTo(Merk::class, 'merk_id', 'id');
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => url('/images/' . $image),
        );
    }

    // public function keeps()
    // {
    //     return $this->hasMany(Keep::class);
    // }

    public function prospekBeli()
    {
        return $this->belongsTo(inventory::class,'nopol','nopol');
    }

    public function aktifitas()
    {
        return $this->hasOne(Aktifitas::class, 'inventory_id');
    }
}
