<?php

use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\CommentsController;



Route::get('/', [PostController::class, 'index']);
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
Route::get('/auth/dashboard', [UserAuthController::class, 'dashboard'])->name('dashboard');
Route::post('auth/dashboard',[UserAuthController::class, 'changePassword'])->name('change.password');
Route::post('auth/dashboard/profile-update',[UserAuthController::class, 'profileUpdate'])->name('profile.update');
Route::post('signout', [UserAuthController::class, 'signOut'])->name('signout');
Route::get('/my_posts',[PostController::class, 'myPosts'])->name('my.posts');
Route::get('/edit-post/{id}',[PostController::class, 'editPost'])->name('posts.edit');
Route::post('/update-post/{id}',[PostController::class, 'updatePost'])->name('posts.update');
Route::get('/delete-post{id}',[PostController::class, 'deletePost'])->name('delete.post');
Route::get('/index/read-all/{id}',[PostController::class, 'readAllPost'])->name('posts.readAllPost');
Route::get('/index/post/{post}/comments',[CommentsController::class, 'show'])->name('posts.comments');
Route::post('index/post/{post}/comments/store', [CommentsController::class, 'storeComment'])->name('comments.store');
Route::delete('/comments/"{comment}', [CommentsController::class, 'destroyComment'])->name('destroy.comment');
