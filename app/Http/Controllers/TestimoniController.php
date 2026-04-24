<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use App\Models\Product;

class TestimoniController extends Controller
{
    public function index()
    {
        $rows = Penilaian::all();

        return view('public.testimoni', compact('rows'));
    }

    public function create()
    {
        $products = Product::all();
        return view('public.testimoni-create', compact('products'));
    }
}