<?php

namespace App\Http\Controllers;

use Cart;

//cho session
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

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
        $data = $request->all();
        $session_id = substr(md5(microtime()), rand(0, 26), 5);
        $cart_ajax = Session::get('cart_ajax');
        // print_r($cart_ajax);
        // return;
        if ($cart_ajax == true) {
            $is_avaiable = 0;
            foreach ($cart_ajax as $key => $val) {
                if ($val['product_id'] == $data['cart_product_id']) {
                    $is_avaiable++;
                }
            }
            if ($is_avaiable == 0) {
                $cart_ajax[] = array(
                    'session_id' => $session_id,
                    'product_name' => $data['cart_product_name'],
                    'product_id' => $data['cart_product_id'],
                    'product_image' => $data['cart_product_image'],
                    'product_qty' => $data['cart_product_qty'],
                    'product_price' => $data['cart_product_price'],
                );
                Session::put('cart_ajax', $cart_ajax);
            }
        } else {
            $cart_ajax[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
            );
            Session::put('cart_ajax', $cart_ajax);
        }

        Session::save();

    }
    public function gio_hang()
    {
        return view('pages.cart.cart_ajax')->with('category_list', [])
            ->with('brand_list', []);
    }
}
