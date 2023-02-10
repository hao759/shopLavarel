<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;


//cho session
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();

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
    
    public function saveCategoryProduct(Request $request)
    {
        $data=array();
        $data['category_name']=$request -> category_product_name;
        $data['category_desc']=$request -> category_product_description;
        $data['category_status']=$request ->category_product_status;
       
        DB::table('tbl_category_product')->insert($data);
        Session::put('messadd','Thêm thành công');
        return Redirect::to('add_category_product');
    }
}
