<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Auth;


class CommentController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware("auth")->except(["comment"]);
    }

    public function comment(Request $request,Post $post)
    {
        $validated =$request->validate([
            'comment'=>'required'
        ]);

        $comment=new Comment;
        $comment->comment=$validated['comment'];
        if(Auth::check())
            $comment->user_id=Auth::user()->id;
        $comment->post_id=$post->id;
        $comment->save();

        return redirect()->route('singlePost',[$post->id])->with('success','The comment was successfully saved!');
    }

    public function delete(Post $post, Comment $comment)
    {
        if((!Auth::check()) || (Auth::user()->id!=$comment->user_id && Auth::user()->id!=$post->user_id))
            return redirect()->route('singlePost',[$post->id])->with('error','Only the comment\'s owner can do this');
        $comment->delete();
        return redirect()->route('singlePost',[$post->id])->with('success','Comment successfilly deleted!');

    }
}
