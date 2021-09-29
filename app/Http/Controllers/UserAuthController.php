<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Illuminate\Support\Facades\Session;
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

        Auth::login($user);
        return redirect('index')->with('success', 'You have signed in');
    }

    public function check(Request $request){
         $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'

        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('index')
                        ->withSuccess('Signed in');
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }
    public function dashboard(){
       
        return view('auth.dashboard');
    }

    public function changePassword(Request $request){
        
        $this->validate($request,[
            'oldPassword' => 'required',
            'newPassword' => 'required|confirmed|min:5|max:12',
            'newPassword_confirmation' =>'required',

        ]);

        $hashPass = Auth::user()->password;

        if(Hash::check($request->oldPassword, $hashPass)){

            $user = User::find(Auth::id());
            $user->password = Hash::make($request->newPassword);
            $user->save();

            return redirect()->route('login')->with('successMsg','Password changed');
        }else{
            return redirect()->back()->with('errorMsg','Invalid to change password');
        }

    }

    public function profileUpdate(Request $request){
        

        $request->validate([
            'newFirstName' =>'required|min:4|string|max:255',
            'newLastName' =>'required|min:4|string|max:255',
            'newEmail'=>'required|email|string|max:255'
        ]);
        
        $user = User::find(Auth::id());
        $user->first_name = $request['newFirstName'];
        $user->last_name = $request['newLastName'];
        $user->email = $request['newEmail'];
        $user->save();

        return back()->with('message','Profile Updated');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
