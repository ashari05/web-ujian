<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\PenilaianFoto;

class Penilaian extends Model
{
    protected $table='penilaian';

    protected $fillable=[
        'produk_id',
        'nama',
        'nama_usaha',
        'alamat_usaha',
        'komentar',
        'rating'
    ];

    public function produk()
    {
    return $this->belongsTo(
    Product::class,
    'produk_id'
    );
    }

    public function fotos()
{
return $this->hasMany(
PenilaianFoto::class,
'penilaian_id'
);
}
}