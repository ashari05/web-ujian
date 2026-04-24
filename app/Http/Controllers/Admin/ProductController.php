<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Kategori;
use App\Models\ProductImage;

class ProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LIST PRODUK
    |--------------------------------------------------------------------------
    */
    public function index(Request $request)
    {
        $filterCat = (int)$request->get('cat',0);

        $allCats = Kategori::where('is_active',1)
            ->orderBy('urutan')
            ->orderBy('nama')
            ->get();

        $query = Product::with([
            'kategoris',
            'images'
        ]);

        if($filterCat > 0){
            $query->whereHas('kategoris',function($q) use($filterCat){
                $q->where('id',$filterCat);
            });
        }

        $products = $query->latest()->get();

        return view(
            'admin.products.index',
            compact('products','allCats','filterCat')
        );
    }



    /*
    |--------------------------------------------------------------------------
    | FORM TAMBAH
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        $kategoris = Kategori::where('is_active',1)->get();

        return view(
            'admin.products.create',
            compact('kategoris')
        );
    }



    /*
    |--------------------------------------------------------------------------
    | SIMPAN PRODUK
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'harga'=>'required|numeric'
        ]);

        $product = Product::create([
            'nama'=>$request->nama,
            'deskripsi'=>$request->deskripsi,
            'harga'=>$request->harga,
            'is_active'=>$request->has('is_active'),
        ]);


        /*
        ------------------------
        kategori pivot
        ------------------------
        */
        if($request->kategori_ids){
            $product->kategoris()
                ->sync($request->kategori_ids);
        }



        /*
        ------------------------
        upload cover biasa
        ------------------------
        */
        if($request->hasFile('gambar')){

            $file = $request->file('gambar');

            $filename=
                time().'_'.$file->getClientOriginalName();

            $file->move(
                public_path('uploads'),
                $filename
            );

            $product->update([
                'gambar'=>$filename
            ]);
        }



        /*
        ------------------------
        cropper galeri
        ------------------------
        */
        $coverFile=null;
        $coverIndex=$request->cover_index ?? 0;

        if($request->cropped_images){

            foreach(
                $request->cropped_images as $i=>$img
            ){

                if(preg_match(
                    '/^data:image\/(\w+);base64,/',
                    $img
                )){

                    $img=substr(
                        $img,
                        strpos($img,',')+1
                    );

                    $img=base64_decode($img);

                    $filename=uniqid().'.jpg';

                    if(!file_exists(
                        public_path('uploads')
                    )){
                        mkdir(
                            public_path('uploads'),
                            0777,
                            true
                        );
                    }

                    file_put_contents(
                        public_path('uploads/'.$filename),
                        $img
                    );

                    ProductImage::create([
                        'produk_id'=>$product->id,
                        'filename'=>$filename
                    ]);

                    if($i==$coverIndex){
                        $coverFile=$filename;
                    }

                }
            }
        }


        if($coverFile){
            $product->update([
                'gambar'=>$coverFile
            ]);
        }

        return redirect()
            ->route('admin.products.index')
            ->with(
                'success',
                'Produk berhasil ditambahkan'
            );
    }



    /*
    |--------------------------------------------------------------------------
    | FORM EDIT
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $product = Product::with([
            'kategoris',
            'images'
        ])->findOrFail($id);

        $allCats = Kategori::where('is_active',1)
            ->orderBy('urutan')
            ->get();

        return view(
            'admin.products.edit',
            compact(
                'product',
                'allCats'
            )
        );
    }




    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */
    public function update(
        Request $request,
        $id
    ){
        $product=Product::findOrFail($id);

        $request->validate([
            'nama'=>'required',
            'harga'=>'required|numeric'
        ]);


        $product->update([
            'nama'=>$request->nama,
            'deskripsi'=>$request->deskripsi,
            'harga'=>$request->harga,
            'is_active'=>$request->has('is_active')
        ]);


        /*
        kategori
        */
        $product->kategoris()
            ->sync(
                $request->kategori_ids ?? []
            );


        /*
        hapus foto galeri
        */
        if($request->hapus_foto){

            foreach(
                $request->hapus_foto as $gid
            ){

                $img=ProductImage::find($gid);

                if($img){

                    @unlink(
                        public_path(
                           'uploads/'.$img->filename
                        )
                    );

                    $img->delete();
                }

            }
        }



        /*
        pilih cover existing
        */
        if($request->cover_existing){
            $product->update([
                'gambar'=>$request->cover_existing
            ]);
        }



        /*
        upload gambar baru
        */
        if($request->hasFile('photos')){

            foreach(
                $request->file('photos') as $file
            ){

                $name=
                    time().rand().'.'.
                    $file->getClientOriginalExtension();

                $file->move(
                    public_path('uploads'),
                    $name
                );

                ProductImage::create([
                    'produk_id'=>$product->id,
                    'filename'=>$name
                ]);

            }

        }

        return redirect()
            ->route('admin.products.index')
            ->with(
                'success',
                'Produk berhasil diupdate'
            );
    }




    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $product=Product::with('images')
            ->findOrFail($id);


        foreach($product->images as $img){

            @unlink(
                public_path(
                    'uploads/'.$img->filename
                )
            );

        }

        $product->images()->delete();


        if($product->gambar){
            @unlink(
                public_path(
                    'uploads/'.$product->gambar
                )
            );
        }


        $product->delete();

        return back()->with(
            'success',
            'Produk berhasil dihapus'
        );
    }
}