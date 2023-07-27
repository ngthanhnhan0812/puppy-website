<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;

class CommentController extends Controller
{
    public $userComment;
    public function __construct()
    {
        $this->userComment=new Comments();
    }

    public function Insert(Request $request)
    {
        $User = $request->session()->get('User');
        $ID = $User["user_ID"];
        $post_ID=$request->input("postID");
        $timeStamp = date("Y-m-d H:i:s", strtotime('now'));
        $Active=0;
        $data=[
        $ID,
        $post_ID,
        $a=$request->input("user_Comment"),
        $timeStamp,
        $Active
        ];
        dd($post_ID,$a);
        $this->userComment->insertComment($data);
        return back()->with('messSuccess','Success !!!');
    }
}
