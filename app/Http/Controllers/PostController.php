<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::orderBy('id', 'desc') -> paginate(5);
        return view('posts.index', compact('posts'));
    }

    public function create(){
        return view('posts.create');
    }

    //Funcion para almacenar los datos enviados desde el formulario, guarda los datos proporcionados y los guarda en la base de datos.
    public function store(StorePostRequest $request){

        

        Post::create($request->all());
        return redirect('/posts'); 
    }

    public function show($post){
        $post = Post::find($post);
        return view('posts.show', compact('post'));
    }

    public function edit($post){
        $post = Post::find($post);
        return view('posts.editPost', compact('post'));
    }

    public function update(Request $request, $post){
       $post = Post::find($post);

       $request->validate([
            'title' => 'required',
            'category' => 'required',
            'content' => 'required'
        ]);

        $post->update($request->all());

        /* $post -> title = $request -> title;
        $post -> category = $request -> category;
        $post -> content = $request -> content; 
        $post->save();*/
        return redirect("/posts/{$post->id}");
    }

    public function destroy($post){
        $post = Post::find($post);
        $post->delete();

        return redirect('/posts');
    }
}
