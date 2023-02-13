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
       return view('checkout.login_checkout')->with('category_list',[])->with('brand_list',[]);
    }
}
