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

    public static function getCategory()
    {
        $data = Category::get();
        return $data;
    }
}
