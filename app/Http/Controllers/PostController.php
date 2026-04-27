<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return $posts;
        return view('posts.index');
    }

    public function create(){
        return view('posts.create');
    }

    public function show($post){
        return view('posts.show', compact('post')
        );
    }
}
