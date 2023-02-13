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
        $data['customer_password'] = $request->customer_password;
        $data['customer_phone'] = $request->customer_phone;
        $customer_ID = DB::table('tbl_customers')
            ->insertGetId($data);
        Session::put('customer_ID', $customer_ID);
        return Redirect::to('/home');
    }

    public function checkout(Request $request)
    {
        $category_list = DB::table('tbl_category_product')
        ->where('category_status', 1)->get();
    $brand_list = DB::table('tbl_brand')
        ->where('brand_status', 1)->get();

        return view("checkout.show_checkout")->with("category_list",$category_list)->with("brand_list",[]);
    }
    public function save_checkout(Request $request)
    {
        $category_list = DB::table('tbl_category_product')
        ->where('category_status', 1)->get();
    $brand_list = DB::table('tbl_brand')
        ->where('brand_status', 1)->get();


        

        return view("checkout.show_checkout")->with("category_list",$category_list)->with("brand_list",[]);
    }
}