<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{

public function index()
{
$rows = Pesanan::latest()->get();

return view(
'admin.pesanan.index',
compact('rows')
);
}


public function create()
{
return view(
'admin.pesanan.create'
);
}


public function store(Request $request)
{
$request->validate([
'nama_pelanggan'=>'required',
'no_hp'=>'required',
'alamat'=>'required',
'tanggal_pesan'=>'required'
]);

Pesanan::create(
$request->all()
);

return redirect()
->route('admin.pesanan.index')
->with(
'success',
'Pesanan berhasil ditambah'
);
}



public function edit($id)
{
$row = Pesanan::findOrFail($id);

return view(
'admin.pesanan.edit',
compact('row')
);
}



public function update(
Request $request,
$id
){

$row = Pesanan::findOrFail($id);

$row->update(
$request->all()
);

return redirect()
->route('admin.pesanan.index')
->with(
'success',
'Pesanan diupdate'
);
}



public function destroy($id)
{
Pesanan::findOrFail($id)
->delete();

return back()
->with(
'success',
'Pesanan dihapus'
);
}

}