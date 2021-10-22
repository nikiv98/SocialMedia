<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\File;

class AdminPostController extends Controller
{
    public function allPosts(){
        $posts = Post::all();
        return view('admin.posts', compact('posts'));
    }

    public function viewPost($id){
        $post = Post::find($id);
        return view('admin.viewPost', compact('post'));
    }
    public function edit(Request $request, $id){
        $post = Post::find($request->id);
        return view('admin.editPost', compact('post'));
    }
    public function update(Request $request, $id){
        $post = Post::find($id);
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
        $post->update();

        return view('admin.viewPost');
    }
    public function delete($id){
        $post = Post::find($id);
        $post->delete();
        return redirect(route('admin.posts'));
    }
}
