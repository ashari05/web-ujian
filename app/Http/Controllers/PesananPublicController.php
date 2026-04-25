<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Pesanan;

class PesananPublicController extends Controller
{

public function create($id)
{
$product = Product::findOrFail($id);

return view(
'public.pesan',
compact('product')
);
}


public function store(Request $request)
{
Pesanan::create([
'produk_id'=>$request->produk_id,
'nama_pelanggan'=>$request->nama_pelanggan,
'no_hp'=>$request->no_hp,
'alamat'=>$request->alamat,
'jumlah'=>$request->jumlah,
'tanggal_pesan'=>now(),
'status'=>'Pending'
]);

return redirect('/produk')
->with(
'success',
'Pesanan berhasil dikirim'
);

}

public function formUmum()
{
$products=Product::where(
'is_active',1
)->get();

return view(
'public.pesan-umum',
compact('products')
);
}

public function index()
{
$rows = \App\Models\Pesanan::latest()
->get();

return view(
'public.pesanan',
compact('rows')
);
}

public function edit($id)
{
$row = \App\Models\Pesanan::findOrFail($id);

return view(
'public.pesanan-edit',
compact('row')
);
}



public function update(
Request $request,
$id
){

$row=\App\Models\Pesanan::findOrFail($id);

$row->update([
'nama_pelanggan'=>$request->nama_pelanggan,
'no_hp'=>$request->no_hp,
'alamat'=>$request->alamat,
'jumlah'=>$request->jumlah,
'catatan'=>$request->catatan
]);

return redirect()
->route('pesanan.index')
->with(
'success',
'Pesanan diupdate'
);

}



public function destroy($id)
{
\App\Models\Pesanan::findOrFail($id)
->delete();

return back()
->with(
'success',
'Pesanan dihapus'
);
}
}