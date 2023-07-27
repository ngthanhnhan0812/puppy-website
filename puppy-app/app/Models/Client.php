<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Client extends Model
{
    use HasFactory;

    public function __construct()
    {
    }

    public function checkLogin($Email, $Pwd)
    {
        $User = DB::select('SELECT user_ID,user_Activity FROM user_p where user_Email=? and user_Pwd=?', [$Email, $Pwd]);
        $Admin = DB::select('SELECT * FROM admin_p where email=? and password=?', [$Email, $Pwd]);
        if (!empty($User)) {
            return [
                "user_ID" => $User[0]->user_ID,
                "user_Activity" => $User[0]->user_Activity
            ];
        } else if (!empty($Admin)) {
            return "Admin";
        } else {
            return "NoData";
        }
    }

    public function Register($data)
    {
        DB::insert('INSERT INTO user_p(user_Name,user_Address,user_DOB,user_Gender,user_Email,user_Pwd,user_Image,user_create_at,user_activity) 
        value(?,?,?,?,?,?,?,?,?)', $data);
    }

    public function selectUser($ID)
    {
        return DB::select("SELECT * FROM user_p where user_ID=?", [$ID]);
    }

    public function profileChange($data)
    {
        DB::update("UPDATE user_p SET user_Name=?,user_Email=?,user_DOB=?,user_Gender=?,user_Address=?,user_Image=? where user_ID=?", $data);
    }

    public function getUserPwdbyID($ID)
    {
        $pwd=  DB::select("SELECT user_Pwd from user_p where user_ID=?",[$ID]);
        return $pwd[0]->user_Pwd;
    }

    public function updateUserPWd($data)
    {
        DB::update('UPDATE user_p set user_Pwd=? where user_ID=?',$data);
    }
}
