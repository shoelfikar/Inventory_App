<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::getCategory();
        return view('pages.category.index', compact('category'));
    }
    public function createCategory()
    {
        return view('pages.category.create');
    }

    public function storeCategory(Request $request)
    {
        $this->validate($request, [
            'cat_name'=> 'required'
        ], [
            'required'=> 'Data :attribute tidak boleh kosong.'
        ]);
        $category = Category::createCategory($request);
        if(!$category){
            return redirect()->back()->with('failed', 'Insert data gagal!');
        }

        return redirect('/category')->with('toast_success', 'Category berhasil dibuat!');
    }
}
