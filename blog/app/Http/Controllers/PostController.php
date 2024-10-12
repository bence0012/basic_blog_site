<?php

namespace App\Http\Controllers;

use Faker\Guesser\Name;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Session;
use Auth;

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
        
        return redirect()->route('posts')->with('success','The blog post was successfully saved!');
    }

    public function singlePost($id)
    {
        $post = Post::find($id);
        $poster=User::find($post->user_id);
        return view('singlePost')->with('post', $post)->with('poster', $poster->name);
    }

    public function update(Request $request, $id)
    {
        
        $post = Post::find($id);
        if(!$this->checkOwner($post))
        {
            return redirect()->route('posts')->with('error','Only the post\'s owner can do this');
        }

        $validated =$request->validate([
            'title'=> 'required',
            'content'=>'required'
        ]);
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->save();

        return $this->singlePost($id)->with('success', 'The blog post was successfully edited!');
    }

    public function getEdit($id)
    {
        $post = Post::find($id);

        if($this->checkOwner($post))
        {
            return view('edit')->with('post', $post)->with('id', $id);
        }
        else
        {
            return redirect()->route('posts')->with('error','Only the post\'s owner can do this');
        }
    }

    public function delete($id)
    {
        $post = Post::find($id);
        if(!$this->checkOwner($post))
        {
            return redirect()->route('posts')->with('error','Only the post\'s owner can do this');
        }
        $post->delete();
        return redirect()->route('posts')->with('success','The blog post was successfully deleted!');
    }


    private function checkOwner( $post){
        $user = User::find($post->user_id);
        if($user->id==Auth::user()->id)
            return true;
        else
            return false;
    }
}
