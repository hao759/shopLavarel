<?php

namespace App\Http\Controllers;

use Cart;

//cho session
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

session_start();
class CartController extends Controller
{
    public function saveCart(Request $request)
    {

        $product_id = $request->product_id;
        $data['id'] = $request->product_id;
        $product_info = DB::table('tbl_product')
            ->where('product_id', $product_id)
            ->get();
        $data['qty'] = $request->qty;
        $data['name'] = $product_info[0]->product_name;
        $data['price'] = $product_info[0]->product_price;
        $data['weight'] = 123;
        $data['options']['image'] = $product_info[0]->product_image;

        Cart::add($data);
        return Redirect::to('/show_Cart');

    }
    public function showCart(Request $request)
    {

        $category_list = DB::table('tbl_category_product')
            ->where('category_status', 1)
            ->get();
        $brand_list = DB::table('tbl_brand')
            ->where('brand_status', 1)
            ->get();

        return view('pages.cart.show_cart')
            ->with('category_list', $category_list)
            ->with('brand_list', $brand_list);
    }

    public function delete_Cart($rowId)
    {

        Cart::update($rowId, 0);

        $category_list = DB::table('tbl_category_product')
            ->where('category_status', 1)
            ->get();
        $brand_list = DB::table('tbl_brand')
            ->where('brand_status', 1)
            ->get();

        return view('pages.cart.show_cart')
            ->with('category_list', $category_list)
            ->with('brand_list', $brand_list);
    }

    public function updata_Cart(Request $request)
    {
        $category_list = DB::table('tbl_category_product')
            ->where('category_status', 1)
            ->get();
        $brand_list = DB::table('tbl_brand')
            ->where('brand_status', 1)
            ->get();
        $rowId = $request->row_ID;
        Cart::update($rowId, $request->quantity);
        return view('pages.cart.show_cart')
            ->with('category_list', $category_list)
            ->with('brand_list', $brand_list);
    }

    public function addToCartAjax(Request $request)
    {
        print_r($request->all());
    }
}
