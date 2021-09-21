<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index','/','contacts','readAllPost']]);
    }
  
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
            
            'body' => 'required',
            'image' => 'mimes:jpg,png,jpeg|max:5048'
        ]);

      
        $newImageName = $request->file('image')->getClientOriginalName();

        $request->image->move(public_path('images'), $newImageName);

 
        $post = new Post;
        $post->body = $request->input('body');
        $post->image_path = $newImageName;
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
        if($request->hasFile('image_path')){

            $destination = public_path('images') .$post->image_path;
            if(File::exists($destination)){

                File::delete($destination);
            }

            $file = $request->file('image_path');
            $extention = $file->getClientOriginalName();
            $filename = time(). '.' . $extention;
            $file->move(public_path('images'), $filename);
            $post->image_path = $filename;

        }
        $post->user_id = auth()->user()->id;
        $post->update();
        
       
        return redirect(route('posts.index'));
    }

    public function deletePost($id){
      
        $post = Post::find($id);
        $post -> delete();

        return redirect(route('my.posts'));

    }
    public function readAllPost($id){
        
        $post = Post::find($id);

        return view('posts.readAllPost', compact('post'));
    }
}
