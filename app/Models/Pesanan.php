<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
protected $table='pesanan';

protected $fillable=[
'nama_pelanggan',
'no_hp',
'alamat',
'tanggal_pesan',
'status',
'catatan'
];
}