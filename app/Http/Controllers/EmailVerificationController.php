<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


class EmailVerificationController extends Controller
{
    public function show(){
        return view('auth.verify-email');
    }
    public function request(Request $request){
        $request->user()->sendEmailVerificationNotification();

        return back()->with('success', 'Verification link sent!');
    }
    public function verify(EmailVerificationRequest $request){
        $request->fulfill();

        return redirect(route('posts.index')); 
    }
}
