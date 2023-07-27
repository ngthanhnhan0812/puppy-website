<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*  */
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

class ShowPostPage extends Controller
{
    //
    public function search_post_page(Request $request){

        $title = 'Show Post Into Page';
        $all_data_post = DB::table('posts_p')
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
            ->join('cate_dog_name', 'cate_dog_name.dog_name_id', '=', 'posts_p.p_dog_name_id')->orderby('posts_p.post_ID', 'desc')->get();


            // $filter=[];
            // $data=[];
            // $data=$request->all();
            // $var = $data['pp_national']; 
            // if($request->pp_national){
            // $nat =$request->pp_national;
            // $filter[] =['cate_national_p.p_national','=', $nat];

            // $all_data_post =DB::table('posts_p')
            // ->join(filter[], '=', 'posts_p.p_national_id')->where()

        
        
    } 
    public function search_post(Request $request){

        $title = 'View Posts';
        $all_data_post = DB::table('posts_p')
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
            ->join('cate_dog_name', 'cate_dog_name.dog_name_id', '=', 'posts_p.p_dog_name_id')->orderby('posts_p.post_ID', 'desc')->get();
    
        

        
        $keywords =$request->keywords;
        
        $search_post= DB::table('posts_p')->where('post_name','like','%'.$keywords.'%')->get();
        return view('Dashboard.Search.search_post', compact('title'))->with('search_post',$search_post) ->with('all_data_post', $all_data_post);
    }

    public function filter_post(Request $request){


        $title = 'View Posts';
        $all_data_post = DB::table('posts_p')
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
            ->join('cate_dog_name', 'cate_dog_name.dog_name_id', '=', 'posts_p.p_dog_name_id')->orderby('posts_p.post_ID', 'desc')->get();




        $f_national =$request->f_national;
        $f_dog_name =$request->f_dog_name;
        $f_group =$request->f_group;
        $f_trainability =$request->f_trainability;
        $barking =$request->f_barking;
        $f_activity =$request->f_activity;
        $_breed =$request->f_breed;
        $characteristics =$request->f_characteristics;
        $f_coat =$request->f_coat;
        $f_shedding =$request->f_shedding;
        $f_size =$request->f_size;
        /* dd($request); */

        $filter_post =DB::table('posts_p')->where('p_national_id','=','f_national')->
        /* where('post_status','0')-> */
        orWhere(function($query){
            $query->where('p_dog_name_id','f_dog_name')
            
            ->where('p_group_id','=','f_group')
            ->where('p_trainability_id','f_trainability')
            ->where('p_barking_lv_id','f_barking')
            ->where('p_activity_id','f_activity')
            ->where('p_breed_id','f_breed')
            ->where('p_characteristics_id','f_characteristics')
            ->where('p_coat_type_id','f_coat')
            ->where('p_shedding_id','f_shedding')
            ->where('p_size_id', 'p_size_id');
            
    })->get();
    return view('Dashboard.Search.filter_post', compact('title'))->with('filter_post',$filter_post) ->with('all_data_post', $all_data_post);
    }
    public function read_post(Request $request, $post_id){

        $all_data_post = DB::table('posts_p')
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
            ->join('cate_dog_name', 'cate_dog_name.dog_name_id', '=', 'posts_p.p_dog_name_id')->orderby('posts_p.post_ID', 'desc')->get();


        $title = 'Show Posts';
        $data_post = DB::table('posts_p')
            ->where('post_ID', '=',$post_id)->get();
            
        return view('Clients.read_post', compact('title'))->with('data_post', $data_post)->with('all_data_post', $all_data_post);
    }
}
