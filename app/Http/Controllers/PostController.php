<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts =Post::all();

        return view('posts.index', [
            'posts' => $posts
        ]);
    }
    public function create(){

        return view('posts.publish');
    }
    public function store(Request $request){

        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'body' => 'required'
        ]);

        $post = new Post;
        $post->fname = $request->input('fname');
        $post->lname = $request->input('lname');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->save();

         return redirect('/posts/publish')->with('success', 'Post created');

    }
    
}
