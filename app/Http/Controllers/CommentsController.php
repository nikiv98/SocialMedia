<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

class CommentsController extends Controller
{
    public function show(Post $post)
    {
        
        return view('posts.comments',[
            'post' => $post,
            'comments'=> Comment::where('post_id', '=', $post->id)->simplePaginate(4)
        ]);
    }

    public function storeComment(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $comment = new Comment(['content' => $request->input('content')]);
        $comment->user()->associate(auth()->user());
        $post->comments()->save($comment);

        return redirect(route('posts.comments', ['post' => $post]));
    }
    
    public function destroyComment(Comment $comment){

        $comment->delete();
        return back();
    }

    public function boot(){

        Paginator::useBootstrap();
    }
    
}
