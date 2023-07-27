<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class BreedDog extends Model
{
    use HasFactory;
    
    protected $table=  'breed_name_dog';
    public function add_breed($data){
        DB::insert('INSERT INTO tb_breed_name_dog (breed_name, images_BR, content_BR, create_BR) VALUES(?, ?, ?, ?)',
        $data );
    }
}
