<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::where('user_type', 'Customer')->count();
        $productCount = Product::count();
        $activeProductCount = Product::where('status', 'active')->count();
        $activeUsertCount =  User::where('user_type', 'Customer')->where('approved', 1)->count();
        $product = Product::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();
        return view('dashboard', ['user' => $userCount, 'produk' => $productCount, 'produkAktif' => $activeProductCount, 'userAktif' => $activeUsertCount,'produklist'=> $product]);
    }
}
