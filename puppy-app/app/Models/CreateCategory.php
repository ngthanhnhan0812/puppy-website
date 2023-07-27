<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class CreateCategory extends Model
{
    use HasFactory;
    
    public $timestamps =false;
    public $table = 'create_category_p';
    /* protected $fillable =[
        'national', 'group', 'activity_lv', 'barking_lv', 'characteristics', 'coat_type', 'shedding', 'size', 'trainability', 'create_at'
    ]; */
    
    /* public function add_category($data){
        DB::insert ('INSERT INTO create_category (national, group, activity_lv, barking_lv, characteristics, coat_type, shedding, size, trainability, create_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
        $data);
    } */
    

}
