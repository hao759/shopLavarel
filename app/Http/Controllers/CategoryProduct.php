<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryProduct extends Controller
{
    //
    public function addCategoryProduct()
    {
        return view('admin.add_category_product');
    }
    public function allCategoryProduct()
    {
        return view('admin.all_category_product');
    }
}
