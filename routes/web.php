<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Models\Post;

Route::get('/', HomeController::class);

//---------------------------------- Paginas de Posts ----------------------------------

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{post}/editPost', [PostController::class, 'edit']);
Route::put('/posts/{post}', [PostController::class, 'update']);
Route::delete('/posts/{post}', [PostController::class, 'destroy']);

//---------------------------------- Paginas de Imagenes ----------------------------------

Route::get('/Image_Table', [ImageController::class, 'index'])->name('images.index');
Route::get('/Image_Table/newImage',  [ImageController::class, 'create'])->name('images.create');
Route::post('/Image_Table',  [ImageController::class, 'store'])->name('images.store');
Route::get('/Image_Table/{image}/editImage',  [ImageController::class, 'edit'])->name('images.edit');
Route::put('/Image_Table/{image}',  [ImageController::class, 'update'])->name('images.update');
Route::patch('/Image_Table/{image}/changeStatus', [ImageController::class, 'changeStatus']) -> name('images.changeStatus');
Route::delete('/Image_Table/{image}',  [ImageController::class, 'destroy'])->name('images.destroy');

//----------------------------------

//Peticiones con las que se puede trabajar
/*
-Get
-Post
-Put
-Patch
-Delete
*/
