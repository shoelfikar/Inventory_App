<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::getAllProduct();
        return view('pages.product.index', compact('product'));
    }

    public function create()
    {
        $category = Category::getAllCategory();
        return view('pages.product.create', compact('category'));
    }

    public function createProduct(Request $request)
    {
        $this->validate($request, [
            'product_name'=> 'required|max:255',
            'category'=> 'required',
            'amount'=> 'required|numeric',
            'price'=> 'required|numeric',
            'stock'=> 'required|numeric',
            'image'=> 'mimes:jpg,png,jpeg'
        ], [
            'required'=> 'Data :attribute tidak boleh kosong.',
            'numeric'=> 'Data :attribute harus angka.',
            'mimes'=> 'Format gambar tidak didukung.'
        ]);

        $product = Product::createProduct($request);
        if(!$product){
            return redirect()->back()->with('toast_error', 'Insert data gagal!');
        }
        return redirect('/products')->with('toast_success', 'Product berhasil dibuat!');
    }

    public function update($id)
    {
        $product = Product::getProduct($id);
        $category = Category::getAllCategory();
        return view('pages.product.update', compact(['product', 'category']));
    }

    public function updateProduct(Request $request, $id)
    {
        $this->validate($request, [
            'product_name'=> 'required|max:255',
            'category'=> 'required',
            'price'=> 'required|numeric',
            'image'=> 'mimes:jpg,png,jpeg'
        ], [
            'required'=> 'Data :attribute tidak boleh kosong.',
            'numeric'=> 'Data :attribute harus angka.',
            'mimes'=> 'Format gambar tidak didukung.'
        ]);
        $product = Product::updateProduct($request, $id);
        if(!$product){
            return redirect()->back()->with('toast_error', 'Update data gagal!');
        }
        return redirect('/products')->with('toast_success', 'Product berhasil diupdate!');
    }

    public function deleteProduct($id)
    {
        $product = Product::deleteProduct($id);
        if(!$product){
            return redirect()->back()->with('toast_error', 'Delete data gagal!');
        }
        return redirect()->back()->with('toast_success', 'Product berhasil di hapus!');
    }
}
