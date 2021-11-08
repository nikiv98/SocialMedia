<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\EmailVerificationController;


Route::get('/', [PostController::class, 'index']);
Route::get('/index', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/publish', [PostController::class, 'create'])->name('posts.publish');
Route::get('/contacts', [ContactsController::class, 'create'])->name('contacts.contactus');
Route::post('/contact/store',[ContactsController::class, 'store'])->name('contact.store');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
Route::get('login', [UserAuthController::class, 'login'])->name('login');
Route::get('register', [UserAuthController::class, 'register'])->name('register');
Route::post('/auth/create',[UserAuthController::class, 'create'])->name('auth.create');
Route::post('check',[UserAuthController::class, 'check'])->name('auth.check');
Route::get('/auth/dashboard', [UserAuthController::class, 'dashboard'])->middleware('verified')->name('dashboard');
Route::post('auth/dashboard',[UserAuthController::class, 'changePassword'])->name('change.password');
Route::post('auth/dashboard/profile-update',[UserAuthController::class, 'profileUpdate'])->name('profile.update');
Route::post('signout', [UserAuthController::class, 'signOut'])->name('signout');
Route::get('/my-posts',[PostController::class, 'myPosts'])->name('my.posts');
Route::get('/edit-post/{id}',[PostController::class, 'editPost'])->name('posts.edit');
Route::post('/update-post/{id}',[PostController::class, 'updatePost'])->name('posts.update');
Route::get('/delete-post{id}',[PostController::class, 'deletePost'])->name('delete.post');
Route::get('/index/read-all/{id}',[PostController::class, 'readAllPost'])->name('posts.readAllPost');
Route::get('/index/post/{post}/comments',[CommentsController::class, 'show'])->name('posts.comments');
Route::post('index/post/{post}/comments/store', [CommentsController::class, 'storeComment'])->name('comments.store');
Route::delete('/comments/"{comment}', [CommentsController::class, 'destroyComment'])->name('destroy.comment');
Route::group(['middleware'=>['auth','admin']], function(){

    Route::get('/admin',[AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('admin/users',[AdminController::class, 'allUsers'])->name('admin.users');
    Route::get('/admin/users/{id}',[AdminController::class, 'viewUser'])->name('view.user');
    Route::get('/admin/users/{id}/edit',[AdminController::class, 'edit'])->name('edit.user');
    Route::post('/admin/users/{id}/update',[AdminController::class, 'update'])->name('update.user');
    Route::get('/admin/users/{id}/delete', [AdminController::class, 'delete'])->name('user.delete');
    Route::get('admin/posts', [AdminPostController::class, 'allPosts'])->name('admin.posts');
    Route::get('admin/posts/{id}', [AdminPostController::class, 'viewPost'])->name('view.post');
    Route::get('/admin/posts/{id}/edit', [AdminPostController::class, 'edit'])->name('edit.post');
    Route::post('/admin/posts/{id}/update', [AdminPostController::class, 'update'])->name('update.post');
    Route::get('/admin/posts/{id}/delete', [AdminPostController::class, 'delete'])->name('post.delete');
});
Route::get('/verify-email', [EmailVerificationController::class, 'show'])
    ->middleware('auth')
    ->name('verification.notice');
Route::post('/verify-email/request', [EmailVerificationController::class, 'request'])
    ->middleware('auth')
    ->name('verification.request');
Route::get('/verify-email/{id}/{hash}', [EmailVerificationController::class, 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

