<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

//cho session

class HomeController extends Controller
{
    //

    public function index(Request $request)
    {
        $meta_desc = "Chuyên bán phụ kiện, linh kiện này nọ.";
        $meta_keywords = "Thực phẩm chức năng, phụ kiện";
        $meta_title = "Khong co j luôn";
        $url_canonical = $request->URL();

        $category_list = DB::table('tbl_category_product')
            ->where('category_status', 1)
            ->get();
        $brand_list = DB::table('tbl_brand')
            ->where('brand_status', 1)
            ->get();
        $all_product = DB::table('tbl_product')
            ->where('product_status', 1)
            ->get();
        return view('pages.home')->with('category_list', $category_list)
            ->with('brand_list', $brand_list)
            ->with('all_product', $all_product)
            ->with(compact('meta_desc', 'meta_keywords', 'meta_title', 'url_canonical'));
    }

    public function showByDanhMuc($category_id)
    {

        $category_list = DB::table('tbl_category_product')
            ->where('category_status', 1)->get();
        $brand_list = DB::table('tbl_brand')
            ->where('brand_status', 1)->get();
        $all_product = DB::table('tbl_product')
            ->where('category_id', $category_id)->get();
        $category_name = DB::table('tbl_category_product')
            ->where('category_id', $category_id)
            ->limit(1)->get();
        return view('category.show_category')
            ->with('all_product', $all_product)
            ->with('category_list', $category_list)
            ->with('brand_list', $brand_list)
            ->with('category_name', $category_name);
    }

    //End Page Admin
    public function showChiTietSanPham($product_id)
    {
        $category_list = DB::table('tbl_category_product')
            ->where('category_status', 1)->get();
        $brand_list = DB::table('tbl_brand')
            ->where('brand_status', 1)->get();
        $detail_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
            ->where('product_id', $product_id)->get();
        $relative_product = DB::table('tbl_product')
        // ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->where('category_id', $detail_product[0]->category_id)
            ->whereNotIn('product_id', [$product_id])
            ->get();
        return view('sanpham.show_detail')
            ->with('category_list', $category_list)
            ->with('brand_list', $brand_list)
            ->with('detail_product', $detail_product)
            ->with('relative_product', $relative_product);
    }
}