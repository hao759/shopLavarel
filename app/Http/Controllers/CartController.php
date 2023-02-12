<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


//cho session
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();
class CartController extends Controller
{
    public function saveCart(Request $request)
    {
        $category_list = DB::table('tbl_category_product')
            ->where('category_status', 1)
            ->get();
        $brand_list = DB::table('tbl_brand')
            ->where('brand_status', 1)
            ->get();
        
    //    $product_id=$request->product_id;
    //    $qty=$request->qty;
    //    $data= DB::table('tbt_product')->where('product_id',$product_id)->get();
        return view('pages.cart.show_cart')->with('category_list', $category_list)
        ->with('brand_list', $brand_list);
    }
}
