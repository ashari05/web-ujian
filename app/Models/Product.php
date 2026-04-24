<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori; // ⬅️ TAMBAHKAN INI

class Product extends Model
{
    use HasFactory;

    protected $table = 'produk'; // ⬅️ penting

    // ⬇️ TAMBAHKAN RELASI DI SINI
    public function kategoris()
    {
        return $this->belongsToMany(
            Kategori::class,
            'produk_kategori',
            'produk_id',
            'kategori_id'
        );
    }
    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'gambar',
        'is_active'
    ];

    public function images()
    {
    return $this->hasMany(
        \App\Models\ProductImage::class,
        'produk_id'
    );
    }

    public function penilaians()
        {
        return $this->hasMany(
            Penilaian::class,
            'produk_id'
        );
    }
}