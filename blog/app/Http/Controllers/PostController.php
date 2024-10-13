<?php

namespace App\Http\Controllers;

use Faker\Guesser\Name;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Session;
use Auth;

use Illuminate\Support\Facades\Gate;


class PostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("auth")->except(["index","singlePost"]);
    }

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('posts')->with('posts' , $posts);
    }

    public function create()
    {
        return view('create');
    }
    public function post(Request $request)
    {
        $validated =$request->validate([
            'title'=> 'required',
            'content'=>'required'
        ]);

        $post = new Post;
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->user_id = Auth::user()->id;
        $post->save();
        
        return redirect()->route('posts')->with('success','The blog post was successfully saved!');
    }

    public function singlePost(Post $post)
    {
        $poster=User::find($post->user_id);
        $comments=Comment::where('post_id', $post->id)->orderBy('id','desc')->get();
        $users=array();
        foreach($comments as $comment)
        {
            if($comment->user_id!=null)
                $comment->user_id=User::find($comment->user_id);
            else
                $users[]=null;
        }
        return view('singlePost')->with('post', $post)->with('poster', $poster->name)->with('comments', $comments->toArray());
    }

    public function update(Request $request, Post $post)
    {
        if (! Gate::allows('update-post', $post)) {
            abort(403);
        }

        $validated =$request->validate([
            'title'=> 'required',
            'content'=>'required'
        ]);
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->save();

        return redirect()->route('singlePost',[$post])->with('success', 'The blog post was successfully edited!');
    }

    public function getEdit(Post $post)
    {
        if (! Gate::allows('update-post', $post)) {
            abort(403);
        }

            return redirect()->route('singlePost',[$post])->with('error','Only the post\'s owner can do this');
        
    }

    public function delete(Post $post)
    {
        if (! Gate::allows('delete-post', $post)) {
            abort(403);
        }

        $comments=Comment::where('post_id', $post->id)->get();
        foreach($comments as $comment)
            $comment->delete();


        $post->delete();
        return redirect()->route('posts')->with('success','The blog post was successfully deleted!');
    }
}
