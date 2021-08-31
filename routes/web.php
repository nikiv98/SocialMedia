<?php

use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserAuthController;



Route::get('/index', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/publish', [PostController::class, 'create'])->name('posts.publish');
Route::get('/contacts', [ContactsController::class, 'create'])->name('contacts.contactus');
Route::post('/contact/store',[ContactsController::class, 'store'])->name('contact.store');

# Added by Velichko
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');

Route::get('login', [UserAuthController::class, 'login'])->name('login');
Route::get('register', [UserAuthController::class, 'register'])->name('register');
Route::post('/auth/create',[UserAuthController::class, 'create'])->name('auth.create');
Route::post('check',[UserAuthController::class, 'check'])->name('auth.check');
Route::get('dashboard', [UserAuthController::class, 'dashboard']);
Route::get('signout', [UserAuthController::class, 'signOut'])->name('signout');
