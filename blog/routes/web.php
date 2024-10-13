<?php

use Illuminate\Support\Facades\Route;
Auth::routes();

Route::get('/', [App\Http\Controllers\PostController::class,'index'])->name('posts');

Route::get('/posts', [App\Http\Controllers\PostController::class,'index'])->name('posts');

Route::get('/posts/create', [App\Http\Controllers\PostController::class,'create'])->name('create');
Route::post('/posts/create', [App\Http\Controllers\PostController::class,'post'])->name('post');

Route::get('/posts/{post}', [App\Http\Controllers\PostController::class,'singlePost'])->name('singlePost');
Route::delete('/posts/{post}', [App\Http\Controllers\PostController::class,'delete'])->name('delete');
Route::put('/posts/{post}', [App\Http\Controllers\PostController::class,'update'])->name('update');
Route::get('/posts/{post}/edit', [App\Http\Controllers\PostController::class,'getEdit'])->name('getEdit');

Route::post('/posts/{post}/comments', [App\Http\Controllers\CommentController::class,'comment'])->name('comment');
Route::delete('/posts/{post}/comments/{comment}', [App\Http\Controllers\CommentController::class,'delete'])->name('delcomment');

