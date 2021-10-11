<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function adminDashboard(){
        $users = DB::table('users')->count();
        $posts = DB::table('posts')->count();
        $comments = DB::table('comments')->count();
        $contacts = DB::table('contacts')->count();
        return view('admin.admin',compact('users', 'posts', 'comments','contacts'));
    }
    public function allUsers(){

        $users = User::all();
        return view('admin.users', compact('users'));
    }
    public function viewUser($id){
        $user = User::find($id);
        $posts = Post::where('user_id', $user->id)->count();
        $comments = Comment::where('user_id', $user->id)->count();

        return view('admin.view', compact('user','posts','comments'));
    }

    public function edit(Request $request, $id){
        $user = User::find($request->id);
        return view('admin.editUser', compact('user'));

    }
    
    public function update(Request $request, $id){
        $user = User::find($id);
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->is_admin = $request->input('is_admin');
        $user->email = $request->input('email');
        $user->update();

        return redirect(route('admin.users'));
        
    }
    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }
}
