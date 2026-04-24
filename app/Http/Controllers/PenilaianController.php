<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Penilaian;

class PenilaianController extends Controller
{

public function publicIndex()
{
$rows = Penilaian::with([
'produk'
])
->where(
'status',
'published'
)
->latest()
->get();

return view(
'public.testimoni',
compact('rows')
);
}


public function create()
{
$products = Product::where(
'is_active',
1
)->orderBy(
'nama'
)->get();

return view(
'public.testimoni-create',
compact('products')
);
}


public function store(Request $request)
{
$request->validate([
'produk_id'=>'required',
'nama'=>'required',
'komentar'=>'required',
'rating'=>'required|integer|min:1|max:5'
]);


Penilaian::create([
'produk_id'=>$request->produk_id,
'nama'=>$request->nama,
'nama_usaha'=>$request->nama_usaha,
'alamat_usaha'=>$request->alamat_usaha,
'komentar'=>$request->komentar,
'rating'=>$request->rating
]);


return redirect()
->route('testimoni.create')
->with(
'success',
'Penilaian berhasil dikirim'
);

}

}