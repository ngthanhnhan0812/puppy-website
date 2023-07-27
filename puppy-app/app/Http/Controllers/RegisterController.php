<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Requests\valiRegister;


class RegisterController extends Controller
{
    //
    public $User;
    public function __construct()
    {
        $this->User = new Client();
    }

    public function registerG()
    {
        return view('Forms.RegisterForm');
    }

    public function registerP(valiRegister $request)
    {
        $basicImg="basicProfile.png";
        $timeStamp = date("Y-m-d H:i:s", strtotime('now'));
        $data = [
            $request->input('regiName'),
            $request->input('regiAddress'),
            $request->input('regiDOB'),
            $request->input('regiGender'),
            $request->input('regiEmail'),
            $request->input('regiPwd'),
            $basicImg,
            $timeStamp,
            1
        ];
        $this->User->Register($data);
        return redirect('/login')->with('messSuccess','Success Register, Login Now');
    }
}
