<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


//cho session
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
class HomeController extends Controller
{
    //
   
    public function index()
    {
        $category_list=DB::table('tbl_category_product')->where('category_status',1)-> get();
        $brand_list=DB::table('tbl_brand')->where('brand_status',1)->get();
        $all_product=DB::table('tbl_product')->where('product_status',1)->get();
        return view('pages.home')->with('category_list',$category_list)->with('brand_list',$brand_list)->with('all_product',$all_product);
    }

    // public function show($id)
    // {
    //     return view('user.profile', [
    //         'user' => User::findOrFail($id)
    //     ]);
    // }
}
