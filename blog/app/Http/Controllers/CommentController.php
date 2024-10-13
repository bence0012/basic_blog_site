<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Auth;

use Illuminate\Support\Facades\Gate;


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
        if (! Gate::allows('delete-post', $post)) {
            abort(403);
        }
        $comment->delete();
        return redirect()->route('singlePost',[$post->id])->with('success','Comment successfilly deleted!');

    }
}
