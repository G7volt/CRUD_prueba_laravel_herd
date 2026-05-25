<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(){
        //importante: el metodo orderBy devuelve una instancia de Builder, por lo que es necesario llamar al metodo get() para obtener los resultados de la consulta.
        $images = Image::orderBy('id', 'desc') -> get();
        $images = Image::orderBy('id', 'desc') -> paginate(5);
        return view('Image_Table.index', compact('images'));
    }

    public function create(){
        return view('Image_Table.newImage');
    }

    //Funcion para almacenar los datos 
    public function store(Request $request){

    //Validamos que el archivo sea una imagen
        $request -> validate([
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //guardamos la imagen en storage/app/public/images y obtenemos la ruta de la imagen guardada
        //El metodo solo devolvera la ruta relativa
        $relativePath = $request -> file('image_url') -> store('images', 'public');


        //logica para almacenar los datos del formulario de imagenes
        $image = new Image();

        $image -> description = $request -> description;
        $image -> image_url = $relativePath; //Guardamos la ruta relativa en la base de datos
        $image -> creation_user = 'User'; //Asignamos un valor fijo para el usuario de creación, ya que no se está obteniendo del formulario
        $image -> creation_date = now(); //Asignamos la fecha actual al campo de creación
        $image -> modification_date = now();
        $image -> status = 'Activo';
        $image -> is_active = true;

        //dd($image);

        $image -> save();

        return redirect('/Image_Table');

    }

    public function edit($image){
        $image = Image::find($image);
        return view('Image_Table.editImage', compact('image'));
    }

    public function update(Request $request, $image){
        $image = Image::find($image);

        $request -> validate([
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //guardamos la imagen en storage/app/public/images y obtenemos la ruta de la imagen guardada
        //El metodo solo devolvera la ruta relativa
        $relativePath = $request -> file('image_url') -> store('images', 'public');

        $image -> description = $request -> description;
        $image -> image_url = $relativePath; //Guardamos la ruta relativa en la base de datos
        $image -> creation_user = 'User';
        $image -> modification_date = now();
        $image -> status = 'Activo';
        $image -> is_active = true;

        //dd($image);

        $image -> save();

        return redirect('/Image_Table');
    }

    public function destroy($image){
        $image = Image::find($image);
        $image -> delete();

        return redirect('/Image_Table');
    }

    public function changeStatus(Image $image){

        $image -> status = $image -> status === 'Activo' ? 'Inactivo' : 'Activo';
        $image -> modification_date = now();
        $image -> save();

        return redirect('/Image_Table');
    }
    

}

    
