<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductHistory;
use Illuminate\Http\Request;

class ProductHistoryController extends Controller
{
    public function index()
    {

        $data = ProductHistory::all();

        return view('product_history.index', ['deletedProducts' => $data]);
    }
    public function restore($id)
    {
        // Cari data riwayat produk yang dihapus berdasarkan ID
        $productHistory = ProductHistory::findOrFail($id);

        // Buat instance produk dari riwayat yang dipilih
        $restoredProduct = new Product([
            'name' => $productHistory->name,
            'price' => $productHistory->price,
            'image_url' => $productHistory->image_url,
            'status' => 'Active', // Atur status menjadi 'Active' saat memulihkan
        ]);

        // Simpan produk ke dalam tabel products
        $restoredProduct->save();

        // Hapus riwayat produk dari ProductHistory setelah restore
        $productHistory->delete();

        return redirect('/product-history/restore');
    }
    
}
