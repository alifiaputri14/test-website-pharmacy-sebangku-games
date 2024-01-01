<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProductRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductHistory;
use Database\Factories\ProductFactory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        // If there is a search query, filter the products; otherwise, retrieve all products.
        $data = $query
            ? Product::where('name', 'like', '%' . $query . '%')->paginate(5)
            : Product::paginate(10);

        return view('product.index', ['product' => $data, 'query' => $query]);
    }
    public function create()
    {

        return view('product.create');
    }
    public function store(ProductRequest  $request)
    {

        $product = Product::create($request->all());
        return redirect('/produk');
    }
    public function edit(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        return view('product.edit', ['product' => $product]);
    }
    public function update(EditProductRequest $request, $id)
    {

        $validatedData = $request->validated();
        $product = Product::findOrFail($id);
        $product->update($validatedData);
        return redirect('produk');
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Simpan data produk yang dihapus ke dalam product_histories
        $productHistory = new ProductHistory();
        $productHistory->name = $product->nama_obat;
        $productHistory->price = $product->harga;
        $productHistory->image_url = $product->image_url;
        $productHistory->status = 'inactive'; 
        $productHistory->save();

        // Hapus produk dari tabel 'products'
        $product->delete();
        return redirect('produk');
    }
    public function restore($id)
    {
        $productHistory = ProductHistory::findOrFail($id);

        $restoredProduct = new Product([
            'name' => $productHistory->name,
            'price' => $productHistory->price,
            'image_url' => $productHistory->image_url,
            'status' => 'Active', 
        ]);

        // Simpan produk ke dalam tabel products
        $restoredProduct->save();

        // Hapus riwayat produk dari ProductHistory setelah restore
        $productHistory->delete();

        return redirect()->route('product_history.index')->with('success', 'Product restored successfully');
    }
    public function viewhistory()
    {
        $deletedProducts = ProductHistory::onlyTrashed()->get();

        return view('product_history.index', compact('deletedProducts'));
    }
}
