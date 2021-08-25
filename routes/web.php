<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;



Route::get('/', [PostController::class, 'index']);
Route::get('/publish', [PostController::class, 'publish']);

# Added by Velichko
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
