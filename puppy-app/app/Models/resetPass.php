<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class resetPass extends Model
{
    use HasFactory;

    public function __construct()
    {
        
    }

    public function checkEmail($data)
    {
        return DB::select('select * from user_p where user_Email = ?', [$data]);
    }

    public function insertToken($data)
    {
        DB::insert('INSERT INTO reset_password_p(email,token,create_at) value (?,?,?)',$data);
    }

    public function checkToken($data)
    {
        return DB::select('SELECT * FROM reset_password_p where token=?',[$data]);
    }

    public function changePassword($data)
    {
        DB::update('UPDATE user_p SET user_Pwd =? where user_Email=?',$data);
    }

    public function selectUser($Email)
    {
       return DB::select('SELECT user_ID from user_p where user_Email=?',[$Email]);
    }

    public function deleteToken($token)
    {
        DB::delete('DELETE FROM reset_password_p where token= ?',[$token]);
    }
}
