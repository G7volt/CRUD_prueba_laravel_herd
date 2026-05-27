<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageController extends Controller
{
    public function index(){
        //importante: el metodo orderBy devuelve una instancia de Builder, por lo que es necesario llamar al metodo get() para obtener los resultados de la consulta.
        $images = Image::orderBy('id', 'desc') -> get();
        $images = Image::orderBy('id', 'desc') -> paginate(10);
        return view('Image_Table.index', compact('images'));
    }

    public function create(){
        return view('Image_Table.newImage');
    }

    public function store(Request $request){
        $request->validate([
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $relativePath = $request->file('image_url')->store('images', 'public');

        $fullPath = storage_path('app/public/' . $relativePath);
        
        $resize = ImageManager::usingDriver(Driver::class)->decode(file_get_contents($fullPath));
        $resize->resize(800,600);
        $resize->save($fullPath);

        $image = new Image();
        $image->description       = $request->description;
        $image->image_url         = $relativePath;
        $image->creation_user     = 'Admin';  
        $image->creation_date     = now();    
        $image->modification_date = now();     
        $image->status            = 'Activo'; 
        $image->is_active         = true;    

        //dd($image); // verifica que ya no lleguen nulls

        $image->save();

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

    
