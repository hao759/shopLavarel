<?php

namespace App\Http\Controllers;

use DB;

//cho session
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

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
        $all_category_product = DB::table('tbl_category_product')->get();
        return view('admin.all_category_product')
            ->with('all_category_product', $all_category_product);

        // $manager_category_product=view('admin.all_category_product')->with('all_category_product',$all_category_product);
        // return view('layout_admin')->with('admin.all_category_product',$manager_category_product);hay hơn
    }

    public function saveCategoryProduct(Request $request)
    {
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_description;
        $data['category_status'] = $request->category_product_status;

        DB::table('tbl_category_product')
            ->insert($data);
        Session::put('messadd', 'Thêm thành công');
        return Redirect::to('add_category_product');
    }
    // active_category_product
    public function active_category_product($category_id)
    {

        DB::table('tbl_category_product')
            ->where('category_id', $category_id)
            ->update(['category_status' => 1]);
        return Redirect::to('all_category_product');
    }
    public function unactive_category_product($category_id)
    {

        DB::table('tbl_category_product')
            ->where('category_id', $category_id)
            ->update(['category_status' => 0]);
        return Redirect::to('all_category_product');
    }

    public function editCategoryProduct($category_id)
    {
        $edit_category_product = DB::table('tbl_category_product')
            ->where('category_id', $category_id)->get();
        return view('admin.edit_category_product')
            ->with('edit_category_product', $edit_category_product);
    }

    public function updateCategoryProduct(Request $request, $category_id)
    {
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_description;

        DB::table('tbl_category_product')
            ->where('category_id', $category_id)
            ->update($data);
        return Redirect::to('all_category_product');
    }
    public function deleteCategoryProduct($category_id)
    {
        DB::table('tbl_category_product')
            ->where('category_id', $category_id)
            ->delete();
        return Redirect::to('all_category_product');
    }
}