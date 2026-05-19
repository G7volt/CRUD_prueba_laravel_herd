<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(){
        //importante: el metodo orderBy devuelve una instancia de Builder, por lo que es necesario llamar al metodo get() para obtener los resultados de la consulta.
        $images = Image::orderBy('id', 'desc') -> get();
        //dd($images);
        return view('Image_Table.index', compact('images'));
    }

    public function create(){
        return view('Image_Table.newImage');
    }

    //Funcion para almacenar los datos 
    public function store(Request $request){
        //logica para almacenar los datos del formulario de imagenes
        $image = new Image();

        //Validamos que el archivo sea una imagen
        $request -> validate([
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //guardamos la imagen en storage/app/public/images y obtenemos la ruta de la imagen guardada
        //El metodo solo devolvera la ruta relativa
        $relativePath = $request -> file('image_url') -> store('images', 'public');


        $image -> description = $request -> description;
        $image -> image_url = $relativePath; //Guardamos la ruta relativa en la base de datos
        $image -> creation_user = $request -> creation_user;
        $image -> creation_date = $request -> creation_date;
        $image -> modification_date = $request -> modification_date;
        $image -> status = $request -> status;
        $image -> is_active = $request -> is_active;

        $image -> save();

        return redirect('/Image_Table');

    }

    public function edit($image){
        $image = Image::find($image);
        return view('Image_Table.editImage', compact('image'));
    }

    public function update(Request $request, $image){
        $image = Image::find($image);

        //logica para almacenar los datos del formulario de imagenes
        $image = new Image();

        //Validamos que el archivo sea una imagen
        $request -> validate([
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //guardamos la imagen en storage/app/public/images y obtenemos la ruta de la imagen guardada
        //El metodo solo devolvera la ruta relativa
        $relativePath = $request -> file('image_url') -> store('images', 'public');

        $image -> description = $request -> description;
        $image -> image_url = $relativePath; //Guardamos la ruta relativa en la base de datos
        $image -> creation_user = $request -> creation_user;
        $image -> creation_date = $request -> creation_date;
        $image -> modification_date = $request -> modification_date;
        $image -> status = $request -> status;
        $image -> is_active = $request -> is_active;

        $image -> save();

        return redirect('/Image_Table');
    }

    public function destroy($image){
        $image = Image::find($image);
        $image -> delete();

        return redirect('/Image_Table');
    }
    

}

    
