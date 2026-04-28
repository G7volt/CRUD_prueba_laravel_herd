<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Models\Post;

Route::get('/', HomeController::class);

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{post}/editPost', [PostController::class, 'edit']);
Route::post('/posts/{post}', [PostController::class, 'update']);

/*Route::get('/posts/{post}/{category?}', function($post, $category = null) {
    
    if ($category) {
        return "aca se muestran los posts de {$post}, de la categoria {$category}";
    }

    return "Aca se muestran los posts de {$post}";
});*/

//Peticiones con las que se puede trabajar
/*
-Get
-Post
-Put
-Patch
-Delete
*/

Route::get('prueba', function () {

    /*
    Funcion para crear nuevo post

    $post = new Post;

    $post->title = 'TITULO DE PRUEBA 5';
    $post->content = 'contenido de prueba 5';
    $post->category = 'categoria de prueba 5';

    $post->save();

    return $post;
    */

    /*
    Funcion para actualizar registros
    $post = Post::where('title', 'titulo de prueba')->first();

    $post -> category = 'desarrollo web';
    $post -> save();
    

    return $post;
    */

    /*
    $post = Post::all();
        Funcion para traer todos los registros de la tabla
    */

    /*
    $post = Post::where('title', 'titulo de prueba 2') -> get();
        Funcion para traer los registros con los parametros inidicados en el parentesis
    */

    /*
    $post = Post::all() -> select('id', 'title', 'category');
            Funcion para traer los registros con los campos solicitados en el parentesis
    */

    /*
    $post = Post::find(2);
    $post -> delete();

        Funcion para eliminar registros de la tabla
    */

    /*
    funcion para mandar el registro 1 de la tabla y leer el campo con la fecha, con formato de DD-MM-AA

    $post = Post::find(1);

    return $post->published_at->format('d/m/Y');
    */

    $post = Post::find(1);

    dd($post->is_active);
});
