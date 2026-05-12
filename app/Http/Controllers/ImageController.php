<?php

namespace App\Http\Controllers;

use App\Models\ImagesTable;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(){
        $images = ImagesTable::orderBy('id', 'desc');
        return view('Image_Table.index', compact('images'));
    }

    public function create(){
        return view('Image_Table.newImage');
    }
    

}

    
