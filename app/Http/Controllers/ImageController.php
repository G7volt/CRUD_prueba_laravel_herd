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

    //Funcion para almacenar los datos 
    public function store(Request $request){
        //logica para almacenar los datos del formulario de imagenes
        $image = new ImagesTable();

        //Validamos que el archivo sea una imagen
        $request -> validate([
            'imageUrl' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //guardamos la imagen en storage/app/public/images y obtenemos la ruta de la imagen guardada
        //El metodo solo devolvera la ruta relativa
        $relativePath = $request -> file('imageUrl') -> store('images', 'public');


        $image -> description = $request -> Description;
        $image -> image_url = $relativePath; //Guardamos la ruta relativa en la base de datos
        $image -> creation_user = $request -> creationUser -> default('Admin');
        $image -> creation_date = $request -> creationDate;
        $image -> modification_date = $request -> modificationDate;
        $image -> status = $request -> status -> default('Activo');
        $image -> is_active = $request -> isActive -> default(true);

        $image -> save();

        return redirect('/Image_Table');

    }

    public function edit($image){

    }
    

}

    
