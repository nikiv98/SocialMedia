<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
  
    public function index(){
        $posts = Post::all();

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function create(){

        return view('posts.publish');
    }

    public function store(Request $request){

        $request->validate([
            
            'body' => 'required'
        ]);

        $post = new Post;
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/posts/publish')->with('success', 'Post created');

    }

    public function myPosts(){
        
        $user = Auth::user();
        $posts = Post::where('user_id', $user->id)->get();

        return view('posts.myPosts', compact('user', 'posts'));
    }

    public function editPost(Request $request, $id){

        $post = Post::find($request->id);
        return view('posts.edit', compact('post'));
    }

    public function updatePost(Request $request, $id){

        $post=Post::find($id);
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->save();
       
        return redirect(route('posts.index'));
    }

    public function deletePost($id){
      
        $post = Post::find($id);
        $post -> delete();

        return redirect(route('my.posts'));

    }
}
