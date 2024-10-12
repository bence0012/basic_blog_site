<?php

use Illuminate\Support\Facades\Route;
Auth::routes();

Route::get('/', [App\Http\Controllers\PostController::class,'index'])->name('posts');

Route::get('/posts', [App\Http\Controllers\PostController::class,'index'])->name('posts');

Route::get('/posts/create', [App\Http\Controllers\PostController::class,'create'])->name('create');
Route::post('/posts/create', [App\Http\Controllers\PostController::class,'post'])->name('post');

Route::get('/posts/{id}', [App\Http\Controllers\PostController::class,'singlePost'])->name('singlePost');
Route::delete('/posts/{id}', [App\Http\Controllers\PostController::class,'delete'])->name('delete');
Route::put('/posts/{id}', [App\Http\Controllers\PostController::class,'update'])->name('update');
Route::get('/posts/{id}/edit', [App\Http\Controllers\PostController::class,'getEdit'])->name('getEdit');

