<?php

use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserAuthController;



Route::get('/', [PostController::class, 'index']);
Route::get('/index', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/publish', [PostController::class, 'create'])
        ->name('posts.publish')
        ->middleware('auth');
Route::get('/contacts', [ContactsController::class, 'create'])->name('contacts.contactus');
Route::post('/contact/store',[ContactsController::class, 'store'])->name('contact.store');

# Added by Velichko
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');

Route::get('login', [UserAuthController::class, 'login'])->name('login');
Route::get('register', [UserAuthController::class, 'register'])->name('register');
Route::post('/auth/create',[UserAuthController::class, 'create'])->name('auth.create');
Route::post('check',[UserAuthController::class, 'check'])->name('auth.check');
Route::get('/auth/dashboard', [UserAuthController::class, 'dashboard'])
        ->name('dashboard')
        ->middleware('auth');
Route::post('auth/dashboard',[UserAuthController::class, 'change_password'])->name('change.password');
Route::post('signout', [UserAuthController::class, 'signOut'])->name('signout');
Route::get('/my_posts',[PostController::class, 'myPosts'])->name('my.posts');
Route::get('/edit-post/{id}',[PostController::class, 'editPost'])->name('posts.edit');
Route::post('/update-post',[PostController::class, 'updatePost'])->name('update.post');
Route::get('/delete-post{id}',[PostController::class, 'deletePost'])->name('delete.post');
