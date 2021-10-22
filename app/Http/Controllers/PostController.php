<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
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
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function create(){
        $users = User::all()->except(Auth::id());
        return view('posts.publish', compact('users'));
    }

    public function store(Request $request){

        $request->validate([
            
            'body' => 'required',
            'image' => 'mimes:jpg,png,jpeg|max:2048|nullable'
        ]);
        
        $newImageName = NULL;
        
        if($request->hasFile('image')){

            $newImageName = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('images'), $newImageName);

        }

        $post = new Post;
        $post->body = $request->input('body');
        $post->image_path = $newImageName;

        if(Auth::user()->is_admin && request('select')){
            $post->user_id = request('select');

        }else{
            $post->user_id = auth()->user()->id;
        }
        $post->save();

        return redirect(route('posts.index'))->with('success', 'Post created');
      
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
        
        if($request->hasFile('image')){

            $destination = public_path('images') .$post->image_path;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('image');
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
        $post->delete();

        return back();

    }
    public function readAllPost($id){
        
        $post = Post::find($id);

        return view('posts.readAllPost', compact('post'));
    }
}
