<?php

namespace App\Http\Controllers;

use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use App\Models\resetPass;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use  App\Http\Requests\valiResetPwd;
use App\Http\Requests\valiChangePwd;

class forgetPassword extends Controller
{
    public $resetPwd;
    public function __construct()
    {
        $this->resetPwd=new resetPass();
    }

    public function resetPwdP()
    {
        return view('Forms.ForgetPassword');
    }

    public function resetPwdG(valiResetPwd $request)
    {
        $Email=$request->input("emailReset");
        $checkEmail=$this->resetPwd->checkEmail($Email);
        if (empty($checkEmail)) {
            # code...
            return redirect('/forget-password')->with('Errors','Email Reset does not exist');
        } else {
            $timeStamp = date("Y-m-d H:i:s", strtotime('now'));
            $token=Str::random(50);
            $data=[
                $Email,
                $token,
                $timeStamp
            ];
            $this->resetPwd->insertToken($data);
            Mail::to($Email)->send(new ResetPassword($token));
            return redirect('/forget-password')->with('Success','The password reset link has been sent to your email');
        }
    }

    public function submitResetG($token)
    {
        $checkToken=$this->resetPwd->checkToken($token);
        if (empty($checkToken)) {
            abort(404);
        }
        return view("Forms.changePassword",['token'=>$token]);
    }

    public function submitResetP(valiChangePwd $request)
    {
        $token=$request->input("token");
        $Email=$request->input("resetEmail");
        $newPwd=$request->input("newPwd");
        $id=$this->resetPwd->selectUser($Email);
        $data=[
            $newPwd,
            $Email
           
        ];
    
        $this->resetPwd->changePassword($data);
        $this->resetPwd->deleteToken($token);
        return redirect('/login')->with('messSuccess','Success Reset Password');
    }
}
