<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $guarded = [];
    public function Category()
    {
        return $this->belongsTo('App\Models\Category', 'cat_id');
    }
    public static function createProduct($request)
    {
        try {
            DB::transaction(function () use($request) {
                if($request->image){
                    $product_image = Str::slug($request->product_name,'_'). '_'. time().'.'. $request->file('image')->getClientOriginalExtension();
                    $request->file('image')->storeAs('public/product', $product_image);
                }
                Product::create([
                    'product_name'=> $request->product_name,
                    'cat_id'=> $request->category,
                    'product_desc'=> $request->description,
                    'product_image'=> $request->image ? $product_image: '',
                    'stock'=> $request->stock
                ]);
            });
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    public static function getAllProduct()
    {
        $data = Product::with(['Category'])->get();
        return $data;
    }

    public static function getProduct($id)
    {
        $product = Product::with(['Category'])->where('id', $id)->first();
        return $product;
    }

    public static function updateProduct($request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id){
                $product = Product::getProduct($id);
                if($request->image){
                    $product_image = Str::slug($request->product_name,'_'). '_'. time().'.'. $request->file('image')->getClientOriginalExtension();
                    $old_image = $product->product_image;
                    $request->file('image')->storeAs('public/product', $product_image);
                    Storage::delete('public/product/'.$old_image);
                }
                Product::where('id', $id)->update([
                    'product_name'=> $request->product_name,
                    'cat_id'=> $request->category,
                    'price'=> $request->price,
                    'product_desc'=> $request->description,
                    'product_image'=> $request->image ? $product_image: $product->product_image,
                ]);
            });
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    public static function deleteProduct($id)
    {
        try {
            DB::transaction(function () use ($id){
                Product::destroy($id);
            });
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }
}
