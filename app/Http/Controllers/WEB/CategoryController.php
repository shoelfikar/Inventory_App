<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('pages.category.index');
    }
    public function createCategory()
    {
        return view('pages.category.create');
    }

    public function storeCategory(Request $request)
    {
        $this->validate($request, [
            'cat_name'=> 'required'
        ]);
        $category = Category::createCategory($request);
        if(!$category){
            return redirect()->back()->with('failed', 'Insert data gagal!');
        }

        return redirect()->back()->with('success', 'Insert data berhasil');
    }
}
