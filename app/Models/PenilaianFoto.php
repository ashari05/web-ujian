<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenilaianFoto extends Model
{
protected $table='penilaian_foto';

protected $fillable=[
'penilaian_id',
'filename'
];

public function penilaian()
{
return $this->belongsTo(
Penilaian::class
);
}
}