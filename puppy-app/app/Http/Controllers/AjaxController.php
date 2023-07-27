<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function __construct()
    {
    }

    public function ajsearchPost(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $valueSearch = $request->input('vsearch');
            $cate_posts = DB::table('posts_p')
                ->where('post_name', 'LIKE', '%' . $valueSearch . '%')
                ->orWhere('describe_p', 'LIKE', '%' . $valueSearch . '%')
                ->orderBy('post_ID', 'desc')
                ->paginate(5);
            if (!empty($cate_posts)) {
               return view('admin.viewRend.rendPost',compact("cate_posts"))->render();
            }
        }
    }

    public function ajdeletePost(Request $request)
    {
        if ($request->ajax()) {
            # code...
            $valueDelete=$request->input("valDelete");
            DB::table('post')->whereIn('post_ID',$valueDelete)->delete();
            $Post=DB::table('Post')->orderBy('post_ID','desc')->paginate(5);
            return view('admin.viewRend.rendPost',compact("Post",$Post))->render();
        }
    }

    public function ajActiveAll(Request $request)
    {
        if ($request->ajax()) {
            # code...
            $valueChange=$request->input("valUser");
            DB::table('user_p')->whereIn('user_ID',$valueChange)->update(['user_activity'=>1]);
            return response("Success Active All");
        }
    }

    public function ajDisableAll(Request $request)
    {
        if ($request->ajax()) {
            # code...
            $valueChange=$request->input("valUser");
            DB::table('user_p')->whereIn('user_ID',$valueChange)->update(['user_activity'=>0]);
            return response("Success Disable All");
        }
    }

    public function ajActiveComment(Request $request)
    {
        if ($request->ajax()) {
            # code...
            $ID=$request->input("id");
            DB::table('comment_p')->where('ID',$ID)->update(['activity'=>1]);
            return response("Success Active Comments");
        }
    }

    public function ajACommentAll(Request $request)
    {
        if ($request->ajax()) {
            # code...
            $valueChange=$request->input("valUser");
            DB::table('comment_p')->whereIn('ID',$valueChange)->update(['activity'=>1]);
            return response("Success Active All");
        }
    }

    public function ajDCommentAll(Request $request)
    {
        if ($request->ajax()) {
            # code...
            $valueChange=$request->input("valUser");
            DB::table('comment_p')->whereIn('ID',$valueChange)->update(['activity'=>0]);
            return response("Success Disable All");
        }
    }

    public function ajsearchUser(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $valueSearch = $request->input('vsearch');
            $Users = DB::table('user_p')
                ->where('user_Name', 'LIKE', '%' . $valueSearch . '%')
                ->orWhere('user_Email', 'LIKE', '%' . $valueSearch . '%')
                ->orderBy('user_ID', 'desc')
                ->paginate(5);   
            if (!empty($Users)) {
                return view('admin.viewRend.rendUser',compact("Users"))->render();
            }
        }
    }
}
