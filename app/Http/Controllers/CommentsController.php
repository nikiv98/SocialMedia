<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function show($id){
        $post = Post::find($id);
        $comment = Comment::where('post_id', $post->id)->get();

        return view('posts.comments', compact('post', 'comment'));
    }
    public function storeComment(Request $request, Post $post){

        $request->validate([
            'content' =>'required'
        ]);
       

        $comment = new Comment([
            'content' => $request -> input('content'),
            'user_id' => auth()->user()->id,
            'post_id' => $post -> id

        ]);

       // $comment -> user_id = auth()->user()->id;
        //$comment -> post_id = $post->id;
        $comment->save();
        
        
        
        
        // $comment = new Comment();
        // $comment -> content = $request -> input('content');
        // $comment -> post_id = $post -> id;
        // $comment -> user_id = auth()->user()->id;
        // $comment -> save();

        return redirect(route('posts.comments'));

    }
}
