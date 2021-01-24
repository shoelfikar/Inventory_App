<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return view('pages.transaction.create');
    }

    public function create()
    {
        $product = Product::getAllProduct();
        return view('pages.transaction.create', compact('product'));
    }

    public function addToCart(Request $request)
    {
        $this->validate($request, [
            'product'=> 'required',
            'price'=> 'required|numeric'
        ], [
            'required'=> 'Data :attribute tidak boleh kosong.'
        ]);
        $product = Product::getProduct($request->product);
        $cart = session()->get('cart');
        if(!$cart){
            $cart = [
                $product->id => [
                    "product_id"=> $product->id,
                    "product_name" => $product->product_name,
                    "price" => $request->price,
                    "category" => $product->Category->cat_name,
                    "qty"=> 1
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('toast_success', 'Product berhasil di tambah ke cart!');
        }

        if(isset($cart[$product->id])){
            $cart[$product->id]['qty'] += 1;
            session()->put('cart', $cart);
            return redirect()->back()->with('toast_success', 'Product berhasil di tambah ke cart!');
        }

        $cart[$product->id] = [
            "product_id"=> $product->id,
            "product_name" => $product->product_name,
            "price" => $product->price,
            "amount" => $product->amount,
            "category" => $product->Category->cat_name,
            "qty"=> 1
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('toast_success', 'Product berhasil di tambah ke cart!');
    }

    public function getCart()
    {
        if(!session('cart')){
            return redirect('/transaction/addtocart');
        }
        $cart = session('cart');
        $amount = [];
        $qty = 0;
        foreach($cart as $item){
            $amount[]= $item['price'] *  $item['qty'];
            $qty += $item['qty'];
        }
        $amount = array_sum($amount);
        return view('pages.transaction.cart', compact(['amount', 'qty']));
    }

    public function deleteItemCart($id)
    {
        $cart = session('cart');
        unset($cart[$id]);
        session(['cart'=> $cart]);
        if(!$cart){
            return redirect('/transaction/cart')->with('toast_info', 'Cart masih kosong, silahkan tambah product!');;
        }
        return redirect('/transaction/cart')->with('toast_success', 'Product berhasil di dihapus dari cart!');
    }

    public function qtyIncrement($id)
    {
        $cart = session()->get('cart');
        $cart[$id]['qty'] += 1;
        session()->put('cart', $cart);
        return redirect()->back()->with('toast_success', 'Quantiti berhasil diubah!');
    }

    public function qtyDecrement($id)
    {
        $cart = session()->get('cart');
        if($cart[$id]['qty'] == 1){
            $cart[$id]['qty'] = 1;
            unset($cart[$id]);
            session(['cart'=> $cart]);
            return redirect()->back()->with('toast_success', 'Quantiti berhasil diubah!');
        }
        $cart[$id]['qty'] -= 1;
        session()->put('cart', $cart);
        return redirect()->back()->with('toast_success', 'Quantiti berhasil diubah!');
    }
}
