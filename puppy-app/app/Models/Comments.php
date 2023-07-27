<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comments extends Model
{
    use HasFactory;
    public function __construct()
    {
        
    }

    public function insertComment($data)
    {
        DB::insert('INSERT into Comment_p(user_ID,post_ID,comment,create_at,activity) value ?,?,?,?,?',$data);
    }
}
