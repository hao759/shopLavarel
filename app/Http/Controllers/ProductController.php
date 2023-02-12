<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


//cho session
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();
class ProductController extends Controller
{
    public function addProduct()
    {
        $category_list = DB::table('tbl_category_product')
            ->get();
        $brand_list = DB::table('tbl_brand')
            ->get();
        return view('admin.add_product')
            ->with('category_list', $category_list)
            ->with('brand_list', $brand_list);
    }
    public function allProduct()
    {
        $all_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->get();
        return view('admin.all_product')
            ->with('all_product', $all_product);

        // $manager_product=view('admin.all_product')->with('all_product',$all_product);
        // return view('layout_admin')->with('admin.all_product',$manager_product);hay hơn
    }

    public function saveProduct(Request $request)
    {
        $data = array();
        $data['category_id'] = $request->product_category;
        $data['brand_id'] = $request->product_brand;
        $data['product_desc'] = $request->product_description;
        $data['product_content'] = $request->product_content;
        $data['product_price'] = $request->product_price;
        $data['product_status'] = $request->product_status;
        $data['product_name'] = $request->product_name;

        $product_image = $request
            ->file('product_image');
        $data['product_image'] = '';

        if ($product_image) {
            $get_name_image = $product_image
                ->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            // $extesion=end(explode('.',$get_name_image));
            $extesion = $product_image->getClientOriginalExtension();
            $new_image = $name_image . rand(0, 99) . '.' . $extesion;
            $product_image
                ->move('public/upload/product', $new_image);
            $data['product_image'] = $new_image;
            Session::put('messadd', 'Thêm sản phẩm thành công');
        }
        DB::table('tbl_product')
            ->insert($data);
        return Redirect::to('add_product');

    }
    // active_product
    public function active_product($product_id)
    {

        DB::table('tbl_product')
            ->where('product_id', $product_id)
            ->update(['product_status' => 1]);
        return Redirect::to('all_product');
    }
    public function unactive_product($product_id)
    {

        DB::table('tbl_product')
            ->where('product_id', $product_id)
            ->update(['product_status' => 0]);
        return Redirect::to('all_product');
    }

    public function editCategoryProduct($category_id)
    {
        $edit_product = DB::table('tbl_product')
            ->where('category_id', $category_id)
            ->get();
        return view('admin.edit_product')
            ->with('edit_product', $edit_product);
    }

    public function updateCategoryProduct(Request $request, $category_id)
    {
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_description;

        DB::table('tbl_product')
            ->where('category_id', $category_id)
            ->update($data);
        return Redirect::to('all_product');
    }
    public function deleteProduct($product_id)
    {
        DB::table('tbl_product')
            ->where('product_id', $product_id)
            ->delete();
        return Redirect::to('all_product');
    }
}