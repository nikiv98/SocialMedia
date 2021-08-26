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
        $post = new Post;
        $post->fname = $request->input('fname');
        $post->lname = $request->input('lname');
        $post->body = $request->input('body');
        $post->save();

         return redirect('/index');

    }
    
}
