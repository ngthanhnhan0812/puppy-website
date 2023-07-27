<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class CreatePost extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table ='posts_p';
}
