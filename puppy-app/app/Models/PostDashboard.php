<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* use */
use Illuminate\Support\Facades\DB;

class PostDashboard extends Model
{
    use HasFactory;
    protected $table ='tb_posts';
    public function add_post($data){
        DB::insert('INSERT INTO tb_posts (dog_name, describes, content, national, group, activity_lv, barking_lv, characteristics, coat_type, shedding, size, trainability, create_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', 
        $data);
    }
    
}

