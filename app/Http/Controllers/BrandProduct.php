<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use DB;
//cho session
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

session_start();
class BrandProduct extends Controller
{
    public function addBrandProduct()
    {
        return view('admin.add_brand_product');
    }
    public function allBrandProduct()
    {
        // $all_brand_product = DB::table('tbl_brand')
        //     ->get();
        $all_brand_product = Brand::all();
        return view('admin.all_brand_product')
            ->with('all_brand_product', $all_brand_product);

        // $manager_brand_product=view('admin.all_brand_product')->with('all_brand_product',$all_brand_product);
        // return view('layout_admin')->with('admin.all_brand_product',$manager_brand_product);hay hơn
    }

    public function saveBrandProduct(Request $request)
    {
        // $data = array();
        // $data['brand_name'] = $request->brand_product_name;
        // $data['brand_desc'] = $request->brand_product_description;
        // $data['brand_status'] = $request->brand_product_status;

        // DB::table('tbl_brand')
        //     ->insert($data);

        $data = $request->all();
        $brand = new Brand();
        $brand->brand_name = $data['brand_product_name'];
        $brand->brand_desc = $data['brand_product_description'];
        $brand->brand_status = $data['brand_product_status'];
        $brand->save();

        Session::put('messadd', 'Thêm thành công');
        return Redirect::to('add_brand_product');
    }
    public function active_brand_product($brand_id)
    {

        DB::table('tbl_brand')
            ->where('brand_id', $brand_id)
            ->update(['brand_status' => 1]);
        return Redirect::to('all_brand_product');
    }
    public function unactive_brand_product($brand_id)
    {

        DB::table('tbl_brand')->where('brand_id', $brand_id)
            ->update(['brand_status' => 0]);
        return Redirect::to('all_brand_product');
    }

    public function editbrandProduct($brand_id)
    {
        $edit_brand_product = DB::table('tbl_brand')
            ->where('brand_id', $brand_id)->get();
        return view('admin.edit_brand_product')
            ->with('edit_brand_product', $edit_brand_product);
    }

    public function updateBrandProduct(Request $request, $brand_id)
    {
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_description;

        DB::table('tbl_brand')
            ->where('brand_id', $brand_id)
            ->update($data);
        return Redirect::to('all_brand_product');
    }
    public function deleteBrandProduct($brand_id)
    {
        DB::table('tbl_brand')
            ->where('brand_id', $brand_id)
            ->delete();
        return Redirect::to('all_brand_product');
    }
}