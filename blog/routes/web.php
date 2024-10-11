<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/posts', [App\Http\Controllers\PostController::class,'index'])->name('posts');

Auth::routes();

Route::get('/posts/create', [App\Http\Controllers\PostController::class,'create'])->name('create');
Route::post('/posts/create', [App\Http\Controllers\PostController::class,'post'])->name('post');
