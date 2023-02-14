<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

//cho session
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;

session_start();

class CheckoutController extends Controller
{
    public function login_checkout(Request $request)
    {
        return view('checkout.login_checkout')
            ->with('category_list', [])
            ->with('brand_list', []); 
    }
    public function add_customer(Request $request)
    {
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);
        $data['customer_phone'] = $request->customer_phone;
        $customer_ID = DB::table('tbl_customers')
            ->insertGetId($data);
        Session::put('customer_ID', $customer_ID);
        return Redirect::to('/home');
    }

    public function checkout(Request $request)
    {
        $category_list = DB::table('tbl_category_product')
            ->where('category_status', 1)
            ->get();
        $brand_list = DB::table('tbl_brand')
            ->where('brand_status', 1)
            ->get();

        return view("checkout.show_checkout")
            ->with("category_list", $category_list)
            ->with("brand_list", $brand_list);
    }
    public function save_checkout(Request $request)
    {

        $data = array();
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_notes'] = $request->shipping_notes;
        $data['shipping_address'] = $request->shipping_address;
        $shipping_id = DB::table('tbl_shipping')
            ->insertGetId($data);
        Session::put('shipping_id', $shipping_id);
        return Redirect::to('/checkout');
    }

    public function userLogin(Request $request)
    {
        $user = $request->User;
        $password = md5($request->password);
        $custom = DB::table('tbl_customers')
            ->where('customer_email', $user)
            ->where('customer_password', $password)
            ->first();
        //    print_r($password);
        if ($custom) {
            Session::put('customer_name', $custom->customer_name);
            return Redirect::to('/home');
        }
        return Redirect::to('/home1');

    }
    public function user_logout(Request $request)
    {
        Session::put('customer_name', "");
        return Redirect::to('/login_checkout');
    }
}