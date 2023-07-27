<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public $Client;
    public function __construct()
    {
        $this->Client=new Admin;
    }

    public function createPuppyG()
    {
        return view('Admin.CreatePuppy');
    }

    public function createPuppyP(Request $request)
    {
        $timeStamp=date("Y-m-d H:i:s", strtotime('now'));
        $data=[
            $request->input('postTitle'),
            $request->input('postCate'),
            $request->input('postDesc'),
            $timeStamp
        ];
        $this->Client->createPost($data);
        return back()->with('messSuccess','Success Create Post');
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
            $request->file('upload')->move(public_path('images/post'), $fileName);
            //Return
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/post/'.$fileName); 
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }

    public function managePost()
    {
        $Post=$this->Client->getPost();
        return view('Admin.managePost',compact("Post", $Post));
    }

    public function editPostG($ID,Request $request)
    {
        $request->session()->put('ID',$ID);
        $Post=$this->Client->getPostbyID($ID);
        return view('Admin.EditPost',["Post"=>$Post]);
    }

    public function editPostP(Request $request)
    {
        $ID=session('ID');
        $data=[
            $request->input('editTitle'),
            $request->input('editCate'),
            $request->input('editDesc'),
            $ID
        ];
        $this->Client->editPost($data);
        return redirect(route('managePost'))->with('messSuccess','Success Edit Post');
        
    }

    public function deletePost($ID)
    {
        $this->Client->deletePost($ID);
        return redirect(route('managePost'))->with('messSuccess','Success Delete Post');
    }

    public function dashBoard()
    {
        $data=$this->Client->dataDashBoard();
        return view('Admin.DashBoard');
    }

    public function userComment()
    {
        $comment=$this->Client->Comments();
        return view('Admin.ManageComment',["Comment"=>$comment]);
    }

    public function deleteComment($ID)
    {
        $this->Client->commentDelete($ID);
        return redirect(route('manage_comment'))->with('messSuccess','Success Delete Comment');
    }

    public function approveComment()
    {
        $comment=$this->Client->approve_Comments();
        return view('Admin.ApproveComment',["Comment"=>$comment]);
    }

    public function userList()
    {
        $Users=$this->Client->getUsers();
        return view('Admin.UserList',["Users"=>$Users]);;
    }


    
}
