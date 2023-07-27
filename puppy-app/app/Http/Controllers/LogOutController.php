<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogOutController extends Controller
{
    public function __construct()
    {
        
    }

    public function logOut(Request $request)
    {
        if(session('User')){
            $request->session()->forget('User');
            return redirect('/')->with('messageIndex', 'Success LogOut Account');
        } else if(!empty($request->cookie('Admin'))){
            setcookie("Admin", "", time()-3600);
            return redirect('/')->with('messageIndex', 'Success LogOut Account');
        } else {
            return redirect('/')->with('messageIndex', 'You Are Not Loggin');
        }
    }
}
