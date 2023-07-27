<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CreatePost;

/* use */
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
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

class CreatePostController extends Controller
{
    //
    public $Client;
    public function __construct()
    {
        $this->Client=new Admin();
    }
    public function add_post(){
        $data=[];
        $title = 'Page Create Post';
        $cate_activity = DB::table('cate_activity_lv_p')->orderby('activity_id', 'desc')->get();
        $cate_barking = DB::table('cate_barking_lv_p')->orderby('barking_id', 'desc')->get();
        $cate_breed = DB::table('cate_breed_p')->orderby('breed_id', 'desc')->get();
        $cate_characteristics = DB::table('cate_characteristics_p')->orderby('characteristics_id', 'desc')->get();
        $cate_coat = DB::table('cate_coat_type_p')->orderby('coat_id', 'desc')->get();    
        $cate_group = DB::table('cate_group_p')->orderby('group_id', 'desc')->get();
        $cate_national = DB::table('cate_national_p')->orderby('national_id', 'desc')->get();
        $cate_shedding = DB::table('cate_shedding_p')->orderby('shedding_id', 'desc')->get();
        $cate_size = DB::table('cate_size_p')->orderby('size_id', 'desc')->get();
        $cate_trainability = DB::table('cate_trainability_p')->orderby('trainability_id', 'desc')->get();
        $cate_dog_name = DB::table('cate_dog_name')->orderby('dog_name_id', 'desc')->get();
        
        $data=[
            "cate_activity"=>$cate_activity,
            "cate_trainability"=>$cate_trainability,
            "cate_barking"=>$cate_barking,
            "cate_breed"=>$cate_breed,
            "cate_characteristics"=>$cate_characteristics,
            "cate_group"=>$cate_group,
            "cate_national"=>$cate_national,
            "cate_shedding"=>$cate_shedding,
            "cate_coat"=>$cate_coat,
            "cate_size"=>$cate_size,
            "cate_dog_name"=>$cate_dog_name,
        ];
        return view('Dashboard.CategoryDetail.add_post', compact('title'))
        ->with(["data" => $data]);
    }
    public function save_post(Request $request){
        $request->validate([
            'post_name' => 'required|max:20',
            'describe' => 'required|max:30'
        ], [
            'post_name.required' => 'required to enter!',
            'post_name.max' => ':max characters limit!',
            'describe.required' => 'required to enter!',
            'describe.max' => ':max characters limit!'
        ]);
        $data=$request->all();
        $p_cate = new CreatePost();

        $p_cate->p_national_id =$data['p_national'];
        $p_cate->p_trainability_id =$data['p_trainability'];
        $p_cate->p_barking_lv_id = $data['p_barking'];
        $p_cate->p_group_id = $data['p_group'];
        $p_cate->p_activity_id = $data['p_activity'];
        $p_cate->p_breed_id = $data['p_breed'];
        $p_cate->p_characteristics_id = $data['p_characteristics'];
        $p_cate->p_shedding_id = $data['p_shedding'];
        $p_cate->p_coat_type_id =$data['p_coat'];
        $p_cate->p_size_id = $data['p_size'];
        $p_cate->describe_p= $data['describe'];
        $p_cate->p_dog_name_id = $data['dog_name'];
        $p_cate->content = $data['content'];
        $p_cate->post_name = $data['post_name'];
        $p_cate->create_at = $data['create_at'];
        
        $get_image =$request->file('images');
            /* echo'<pre>';print_r($data);echo'</pre>'; */
            if($get_image){
                $get_name_image =$get_image->getClientOriginalName();
                $name_image =current(explode('.',$get_name_image));
                $new_image =$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                $get_image->move('upload/images/', $new_image);
                $data['images'] =$new_image;
                $this->Client->imageLibInsert($new_image);
            }
        $p_cate->images =$new_image;

        $p_cate->save();
        return redirect()->back();
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            //getFileName
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
        
            $this->Client->imageLibInsert($fileName);
            //MoveFile
            $request->file('upload')->move(public_path('upload/images'), $fileName);
            //Return
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('upload/images/'.$fileName); 
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }

    public function show_post(){
        $data=[];
        $title = 'Page Create Post';
        $cate_activity = DB::table('cate_activity_lv_p')->orderby('activity_id', 'desc')->get();
        $cate_barking = DB::table('cate_barking_lv_p')->orderby('barking_id', 'desc')->get();
        $cate_breed = DB::table('cate_breed_p')->orderby('breed_id', 'desc')->get();
        $cate_characteristics = DB::table('cate_characteristics_p')->orderby('characteristics_id', 'desc')->get();
        $cate_coat = DB::table('cate_coat_type_p')->orderby('coat_id', 'desc')->get();    
        $cate_group = DB::table('cate_group_p')->orderby('group_id', 'desc')->get();
        $cate_national = DB::table('cate_national_p')->orderby('national_id', 'desc')->get();
        $cate_shedding = DB::table('cate_shedding_p')->orderby('shedding_id', 'desc')->get();
        $cate_size = DB::table('cate_size_p')->orderby('size_id', 'desc')->get();
        $cate_trainability = DB::table('cate_trainability_p')->orderby('trainability_id', 'desc')->get();
        $cate_dog_name = DB::table('cate_dog_name')->orderby('dog_name_id', 'desc')->get();
        $cate_posts = DB::table('posts_p')->orderby('post_ID', 'desc')->paginate(5);
        /* dd($cate_posts); */
        $data=[
            "cate_activity"=>$cate_activity,
            "cate_trainability"=>$cate_trainability,
            "cate_barking"=>$cate_barking,
            "cate_breed"=>$cate_breed,
            "cate_characteristics"=>$cate_characteristics,
            "cate_group"=>$cate_group,
            "cate_national"=>$cate_national,
            "cate_shedding"=>$cate_shedding,
            "cate_coat"=>$cate_coat,
            "cate_size"=>$cate_size,
            "cate_dog_name"=>$cate_dog_name,
        ];
        return view('Dashboard.CategoryDetail.show_post', compact('title'))
        ->with('cate_posts',$cate_posts);/* ->with(["data" => $data]) */
    }
    /* active & non active */
    public function active_post($pos_id){
        DB::table('posts_p')->where('post_ID', $pos_id)->update(['post_status'=>0]);
        return Redirect()->route('show_post')->with('msg', 'Success Active Post');
    }

    public function unactive_post($pos_id){
        DB::table('posts_p')->where('post_ID', $pos_id)->update(['post_status'=>1]);
        return Redirect()->route('show_post')->with('msg', 'Success Disable Post !');
    }
    /* end! act& non act */

    /*  */
    public function edit_post($post_id,Request $request){
        
        $request->session()->push("p_ID",$post_id);
        $post=$this->Client->getPostbyID($post_id);
        $data=[];
        $cate_activity = DB::table('cate_activity_lv_p')->orderby('activity_id', 'desc')->get();
        $cate_barking = DB::table('cate_barking_lv_p')->orderby('barking_id', 'desc')->get();
        $cate_breed = DB::table('cate_breed_p')->orderby('breed_id', 'desc')->get();
        $cate_characteristics = DB::table('cate_characteristics_p')->orderby('characteristics_id', 'desc')->get();
        $cate_coat = DB::table('cate_coat_type_p')->orderby('coat_id', 'desc')->get();    
        $cate_group = DB::table('cate_group_p')->orderby('group_id', 'desc')->get();
        $cate_national = DB::table('cate_national_p')->orderby('national_id', 'desc')->get();
        $cate_shedding = DB::table('cate_shedding_p')->orderby('shedding_id', 'desc')->get();
        $cate_size = DB::table('cate_size_p')->orderby('size_id', 'desc')->get();
        $cate_trainability = DB::table('cate_trainability_p')->orderby('trainability_id', 'desc')->get();
        $cate_dog_name = DB::table('cate_dog_name')->orderby('dog_name_id', 'desc')->get();
        $data=[
            "cate_activity"=>$cate_activity,
            "cate_trainability"=>$cate_trainability,
            "cate_barking"=>$cate_barking,
            "cate_breed"=>$cate_breed,
            "cate_characteristics"=>$cate_characteristics,
            "cate_group"=>$cate_group,
            "cate_national"=>$cate_national,
            "cate_shedding"=>$cate_shedding,
            "cate_coat"=>$cate_coat,
            "cate_size"=>$cate_size,
            "cate_dog_name"=>$cate_dog_name,
            "Post"=>$post,
        ];
        return view('Dashboard.EditPost.edit_post')
        ->with(["data" => $data]);
    }
    public function update_post(Request $request){
        $timeStamp = date("Y-m-d H:i:s", strtotime('now'));
        $ID=$request->session()->get("p_ID");
        $rID=$ID[0];
        if($request->hasFile('images')){
            $get_image =$request->file('images');
            /* echo'<pre>';print_r($data);echo'</pre>'; */
            if($get_image){
                $get_name_image =$get_image->getClientOriginalName();
                $name_image =current(explode('.',$get_name_image));
                $new_image =$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                $get_image->move('/upload/images/', $new_image);
                $image=$new_image;
            }
        } else {
            $image=$request->input("oldImages");
        }
        $data=[
            $request->input("describe"),
            $request->input("content"),
            $image,
            $timeStamp,
            $rID
        ];
        $request->session()->flush();
        $this->Client->updatePost($data);
        return redirect()->route('show_post')->with('msg', 'Success Update Post'); 
    }

    public function delete_post( $post_id){
        DB::table('posts_p')->where('post_ID', $post_id)->delete();
        return redirect()->route('show_post')->with('msg', 'Success Delete Post');
    }

}


