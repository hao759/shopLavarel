<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin_login');
    }
    
    public function showDashboard()
    {
        return view('admin.dashboard');
    }
    public function dashboard(Request $request)
    {
       $admin_email=$request->admin_email;
       $admin_password=$request->admin_password;// md5($request->admin_password;)
       $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
    //    print_r($result);
        return view('admin.dashboard');
    }
}
