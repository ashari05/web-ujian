<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    public function publicIndex()
    {
        $products = Product::all();

        return view(
            'public.produk',
            compact('products')
        );
    }

    public function show($id)
    {
    $product = Product::with(
        [
        'images',
        'kategoris'
        ]
        )->findOrFail($id);

        return view(
        'public.produk-detail',
        compact('product')
        );
    }
}
