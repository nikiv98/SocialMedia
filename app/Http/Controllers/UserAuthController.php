<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


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
            'password'=>'required|min:5|max:12',
            'password'=>'confirmed'
        ]);

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('index')->with('success', 'You have signed in');
    }

    public function check(Request $request){
         $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'

        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut() {
        Auth::logout();
  
        return Redirect('login');
    }
}
