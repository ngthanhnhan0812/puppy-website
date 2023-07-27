<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\valiChangeProfile;
use App\Http\Requests\valiUserChangePwd;
use Illuminate\Support\Facades\Cookie;
use App\Models\Client;

class UserController extends Controller
{
    public $Profile;
    public function __construct()
    {
        $this->Profile = new Client();
    }

    public function userProfile(Request $request)
    {
        $User = $request->session()->get('User');
        $ID = $User["user_ID"];
        $userProfile = $this->Profile->selectUser($ID);
        return view('Forms.userProfile', ["userProfile" => $userProfile]);
    }

    public function editProfile(Request $request)
    {
        $User = $request->session()->get('User');
        $ID = $User["user_ID"];
        $userProfile = $this->Profile->selectUser($ID);
        return view('Forms.editProfile', ["userProfile" => $userProfile]);
    }

    public function changeProfile(valiChangeProfile $request)
    {
        if ($request->hasFile("editAvatar")) {
            # code...
            $image = $request->file("editAvatar");
            $Avatar = $image->getClientOriginalName();
            $location = "images/Profile";
            $image->move($location, $Avatar);
        } else {
            $Avatar = "basicProfile.png";
        }
        $User = $request->session()->get('User');
        $ID = $User["user_ID"];
        $data = [
            $request->input("editName"),
            $request->input("editEmail"),
            $request->input("editDOB"),
            $request->input("editGender"),
            $request->input("editAddress"),
            $Avatar,
            $ID

        ];
        $this->Profile->profileChange($data);
        return redirect(route("userProfile"))->with(["Success", 'Success Change User Profile']);
    }

    public function changePassG(Request $request)
    {
        $User = $request->session()->get('User');
        $ID = $User["user_ID"];
        $userProfile = $this->Profile->selectUser($ID);
        return view("Forms.userPwdchange", ["userProfile" => $userProfile]);
    }

    public function changePassP(valiUserChangePwd $request)
    {
        $User = $request->session()->get('User');
        $ID = $User["user_ID"];
        $userProfile = $this->Profile->selectUser($ID);
        $currentPwd = $this->Profile->getUserPwdbyID($ID);
        $currentPwdRequest=$request->input("changePwd");
        $newPwd = $request->input("newPwd");
        if ($currentPwd == $currentPwdRequest) {
            # code...
            $data = [
                $newPwd,
                $ID
            ];
            $this->Profile->updateUserPWd($data);
            return redirect(route("userProfile"))->with([
                "Success" => "Success Change User Password",
                "userProfile" => $userProfile
            ]);
        } else {
            return redirect(route('changePass'))->withErrors("Wrong Current Password");
        }
    }
}
