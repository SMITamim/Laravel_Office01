<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    function AdminLogin()
    {
        return view('adminlogin');
    }

    function LogInSubmit(Request $request)
    {
       $admin=Admin::where('UserId',$request->username)->where('Pass',$request->password)->first();
        if($admin)
        {
            $request->session()->put('id',$admin->id);
            return redirect()->route('AdminHomePage');
        }
        else{
            return redirect()->back();
        }
        //return redirect()->route('AdminHomePage');
    }
}
