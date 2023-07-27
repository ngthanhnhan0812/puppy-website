<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admin extends Model
{
    use HasFactory;
    public function __construct()
    {
        
    }

    public function updatePost($data)
    {
        DB::update('UPDATE posts_p set describe_p=?,content=?,images=?,update_at=? where post_ID=?',$data);
    }

    public function imageLibInsert($imageName)
    {
        DB::insert('INSERT into imageLib_p(image_Name) value (?)',[$imageName]);
    }
    //Post

    public function getPostbyID($ID)
    {
        return DB::select('SELECT * FROM posts_p where post_ID=?',[$ID]);
    }

    public function dataDashBoard()
    {
        $data=array();
        // $Post= DB::table('Post')->count();
        $User=DB::table('User_p')->count();

        array_push($data,$User);
        return $data;

    }

    public function Comments()
    {
        return DB::select(' SELECT u.user_Name,u.user_Email,c.id,c.Comment,c.create_at
        FROM User_p u join Comment_p c on c.user_ID=u.user_ID
        WHERE c.activity=1;
        ');
    }

    public function commentDelete($ID)
    {
        DB::delete('DELETE FROM comment_p where Id=?',[$ID]);
    }

    public function approve_Comments()
    {
        return DB::select(' SELECT u.user_ID,u.user_Name,u.user_Email,c.id,c.Comment,c.create_at
        FROM User_p u join Comment_p c on c.user_ID=u.user_ID
        WHERE c.activity=0;
        ');
    }

    public function getUsers()
    {
        return DB::table('user_p')->paginate(10);
    }
    
    public function getImageDB()
    {
        return DB::select("SELECT * FROM imagelib_p");
    }
    
}
