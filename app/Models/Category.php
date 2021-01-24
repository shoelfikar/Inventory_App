<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $guarded = [];
    public static function createCategory($request)
    {
        try {
            DB::transaction(function () use ($request) {
                Category::create([
                    'cat_name'=> $request->cat_name,
                    'cat_desc'=> $request->cat_desc
                ]);
            });
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    public static function getAllCategory()
    {
        $data = Category::get();
        return $data;
    }

    public static function getCategory($id)
    {
        $data = Category::where('id', $id)->first();
        return $data;
    }

    public static function updateCategory($request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id){
                Category::where('id', $id)->update([
                    'cat_name'=> $request->cat_name,
                    'cat_desc'=> $request->cat_desc
                ]);
            });
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    public static function deleteCategory($id)
    {
        try {
            DB::transaction(function () use ($id){
                Category::where('id', $id)->delete();
            });
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }
}
