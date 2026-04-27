<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;


class ImageController extends controller
{
    public function index()
    {
        
    }

    public function create(){
        return view('post.newImage');
    }
    

}

    
