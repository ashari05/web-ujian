<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{

    public function index(Request $request)
    {
        $status = $request->status;

        $query = Kategori::query();

        if($status !== null && $status !== ''){
            $query->where(
                'is_active',
                $status
            );
        }

        $rows = $query
            ->orderBy('urutan')
            ->orderBy('nama')
            ->get();

        return view(
            'admin.kategori.index',
            compact('rows','status')
        );
    }



    public function create()
    {
        return view(
            'admin.kategori.create'
        );
    }



    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required'
        ]);

        Kategori::create([
        'nama'=>$request->nama,
        'urutan'=>$request->urutan,
        'is_active'=>$request->has('is_active')
        ]);

        return redirect()
         ->route('admin.kategori.index')
         ->with(
            'success',
            'Kategori ditambahkan'
         );
    }



    public function edit($id)
    {
        $kategori=
           Kategori::findOrFail($id);

        return view(
          'admin.kategori.edit',
          compact('kategori')
        );
    }



    public function update(
        Request $request,
        $id
    ){
        $kategori=
            Kategori::findOrFail($id);

        $kategori->update([
        'nama'=>$request->nama,
        'urutan'=>$request->urutan,
        'is_active'=>$request->has('is_active')
        ]);

        return redirect()
         ->route('admin.kategori.index')
         ->with(
           'success',
           'Kategori diupdate'
         );
    }



    public function destroy($id)
    {
        Kategori::findOrFail($id)
           ->delete();

        return back()
          ->with(
            'success',
            'Kategori dihapus'
          );
    }

}