<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status;

        $query = DB::table('penilaian as p')
            ->leftJoin('produk as pr','pr.id','=','p.produk_id')
            ->select(
                'p.*',
                'pr.nama as produk_nama'
            )
            ->orderByDesc('p.id');

        if($status){
            $query->where('p.status',$status);
        }

        $rows = $query->get();

        return view(
            'admin.penilaian.index',
            compact('rows','status')
        );
    }


    public function updateStatus(
        Request $request,
        $id
    ){
        DB::table('penilaian')
            ->where('id',$id)
            ->update([
                'status'=>$request->status
            ]);

        return back()
          ->with(
             'success',
             'Status diperbarui'
          );
    }



    public function destroy($id)
    {
        DB::table('penilaian')
            ->where('id',$id)
            ->delete();

        return back()
           ->with(
             'success',
             'Penilaian dihapus'
           );
    }

}