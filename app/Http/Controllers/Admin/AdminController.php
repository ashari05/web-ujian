<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Penilaian;

class AdminController extends Controller
{
    public function dashboard()
    {
        return redirect()->route('admin.products.index');
    }
}
