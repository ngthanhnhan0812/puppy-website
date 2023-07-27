<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cate_breed;
use App\Models\cate_barking;
use App\Models\cate_characteristics;
use App\Models\cate_coat;
use App\Models\cate_group;
use App\Models\cate_activity_lv;
use App\Models\cate_national;
use App\Models\cate_shedding;
use App\Models\cate_size;
use App\Models\cate_trainability;
use App\Models\cate_dogname;
use App\Models\CreatePost;
use Illuminate\Support\Facades\DB;

class PageIndex extends Controller
{
    //
    public function index_page(){
        $title='Home Page';
        $post_index=DB::table('posts_p')
        ->join('cate_activity_lv_p', 'cate_activity_lv_p.activity_id', '=', 'posts_p.p_activity_id')
        ->join('cate_barking_lv_p', 'cate_barking_lv_p.barking_id', '=', 'posts_p.p_barking_lv_id')
        ->join('cate_breed_p', 'cate_breed_p.breed_id', '=', 'posts_p.p_breed_id')
        ->join('cate_characteristics_p', 'cate_characteristics_p.characteristics_id', '=', 'posts_p.p_characteristics_id')
        ->join('cate_coat_type_p', 'cate_coat_type_p.coat_id', '=', 'posts_p.p_coat_type_id')
        ->join('cate_group_p', 'cate_group_p.group_id', '=', 'posts_p.p_group_id')
        ->join('cate_national_p', 'cate_national_p.national_id', '=', 'posts_p.p_national_id')
        ->join('cate_shedding_p', 'cate_shedding_p.shedding_id', '=', 'posts_p.p_shedding_id')
        ->join('cate_size_p', 'cate_size_p.size_id', '=', 'posts_p.p_size_id')
        ->join('cate_trainability_p', 'cate_trainability_p.trainability_id', '=', 'posts_p.p_trainability_id')
        ->join('cate_dog_name', 'cate_dog_name.dog_name_id', '=', 'posts_p.p_dog_name_id')->inRandomOrder()->take(6)
        ->get();
        return view('Clients.index', compact('title') )->with('post_index',$post_index);
        /* dd($post_index); */

    }
}
