<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts =Post::all();

        return view('index', [
            'posts' => $posts
        ]);
    }
    public function create(){

        return view('publish');
    }
    public function store(Request $request){
        $post = new Post;
        $post->fname = $request->input('fname');
        $post->lname = $request->input('lname');
        $post->body = $request->textarea('body');
        $post->save();

         return redirect('/');


    }
    public function publish(){
        return view('publish');
    }
    
}
