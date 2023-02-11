<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


//cho session
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();



class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin_login');
    }

    public function AuthLogin()
    {
        $admin_id=Session::get('admin_id');
        if($admin_id)
            return Redirect::to('dashboard');
        return Redirect::to('admin')->send();
    }

    public function showDashboard()
    {
        $this->AuthLogin();
        return view('admin.dashboard');
    }
    public function dashboard(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = $request->admin_password; // md5($request->admin_password;)
        $result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
        //    print_r($result);
        if ($result) {
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->admin_id);
            return Redirect::to('/dashboard');
        }
        Session::put('message',"Mat khau khong chinh xac");
        return Redirect::to('/admin');

    }
    public function logout(Request $request)
    {
        Session::put('admin_name', null);
        Session::put('admin_id',null);
        Session::put('message',null);
        return Redirect::to('/admin');
    }
}