<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Post;
use Session;
use Auth;

class PostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("auth");
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
    public function post(Request $request):RedirectResponse
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
        

        Session::flash('success', 'The blog post was successfully save!');

        return redirect()->route('posts')->with('success','');
    }

}
