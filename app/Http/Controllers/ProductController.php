<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{

    // Method untuk enampilkan halaman utama
    public function index(): View
    {
        $data = [
            'list_data_produk' => Product::latest()->paginate(10),
        ];
        // dd($data);
        return view('productPackage.index', $data);
    }
    // -------------------------------------------------------------

    // Method untuk menampilkan form create POST
    public function create(): View
    {
        return view('productPackage.create');
    }
    // -------------------------------------------------------------

    // Method untuk melakukan insert data
    public function store(StoreProductRequest $request): RedirectResponse
    {
        Product::create($request->all());
        return redirect()->route('brand.index')->withSuccess('New product is added successfully.');
    }
    // -------------------------------------------------------------

    // Method untuk menampilkan data single POST / detail data dari sebuah POST
    public function show(Product $produk): View
    {
        return view('productPackage.show', [
            'data_produk' => $produk
        ]);
    }
    // -------------------------------------------------------------

    // Method untuk menampilkan form edit
    public function edit(Product $p): View
    {
        return view('productPackage.edit', ['p' => $p]);
    }
    // -------------------------------------------------------------

    // Method untuk melakukan update data
    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->all());
        return redirect()->back()->withSuccess('Product is updated successfully.');
    }
    // -------------------------------------------------------------

    // Method untuk melakukan hapus data
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return redirect()->route('brand.index')->withSuccess('Produk berhasil dihapus.');
    }
    // -------------------------------------------------------------
}
