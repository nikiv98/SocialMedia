<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use App\Models\User;

class UserAuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function create(Request $request){
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12'
        ]);

        $user = new User;
        $user->first_name = $request->fist_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('index')->with('success', 'You have signed in');
    }
}
