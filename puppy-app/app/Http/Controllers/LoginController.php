<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Requests\valiLogin;

class LoginController extends Controller
{
    public $Clients;
    public function __construct()
    {
        $this->Clients = new Client();
    }

    public function loginG()
    {
        return view('Forms.LoginForm');
    }

    public function loginP(valiLogin $request)
    {
        $Email = $request->input('loginEmail');
        $Pwd = $request->input('loginPwd');
        $Check = $this->Clients->checkLogin($Email, $Pwd);
        if ($Check == "Admin") {
            $time = 60;
            $Admin = cookie("Admin", "Admin", $time);
            return redirect(route("dashboard"))->withCookie($Admin);
        } else if (!empty($Check["user_ID"])) {
            if ($Check["user_Activity"]==0) {
                return redirect('/login')->with("disableAccount",'Your Account Have Been Disable,Please Contact');
            }
            $request->session()->put("User", $Check);
            return redirect('/')->with('messageIndex', 'Welcome Back With Patrona');
        } else if ($Check == "NoData") {
            return redirect('/login')->withInput()->with('messError', 'Login Fail ! Please Check Back');
        }
    }
}
