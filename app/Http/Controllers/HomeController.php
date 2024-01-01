<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $produk = Product::where('status', 'active')->get();
        return view('home', ['produk'=>$produk]);
    }
}
