<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageController extends Controller
{
    public function index(Request $request){
        //importante: el metodo orderBy devuelve una instancia de Builder, por lo que es necesario llamar al metodo get() para obtener los resultados de la consulta.
        $images = Image::orderBy('creation_date', 'desc') -> get();
        $images = Image::orderBy('creation_date', 'desc') -> paginate(10);

        //Captura el valor del imput 'buscar'
        $busqueda = $request -> input('search');

        //filtra los productos si hay una busqueda en el imput, de lo contrario trae todos
        $images = Image::query() 
                ->when($busqueda, function($query, $busqueda){
                    return $query -> where('description', 'ilike', "%{$busqueda}%")
                    ->orWhere('description', 'ilike', "%{$busqueda}%");
                })
                ->paginate(10)//Resultado de la busqueda pagina en 10 en 10
                ->appends(['search' => $busqueda])
                ->appends($request->query()); //Mantiene el valor del imput 'buscar' en la paginacion

                //Si es vista AJAX retorna un json como los datos de la tabla, de lo contrario retorna la vista normal
        if ($request->ajax()){
            return response()->json([
                'html' => view('Image_Table.partials.table', compact('images')) -> render()
            ]);
        }

        return view('Image_Table.index', compact('images'));
    }

    public function create(){
        return view('Image_Table.newImage');
    }

    public function store(Request $request){

        $request->validate([
            'description' => 'required',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'description.required' => 'La descripcion es obligatoria',
            'image_url.required' => 'La imagen es obligatoria',
            'image_url.image' => 'El archivo debe ser una imagen',
            'image_url.mimes' => 'La imagen debe ser un archivo de tipo: jpeg, png, jpg, gif, svg',
            'image_url.max' => 'La imagen no debe ser mayor a 2MB',
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
        $image->status            = 'Inactivo'; 
        $image->is_active         = false;    
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
            'description' => 'required',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'description.required' => 'La descripcion es obligatoria',
            'image_url.required' => 'La imagen es obligatoria',
            'image_url.image' => 'El archivo debe ser una imagen',
            'image_url.mimes' => 'La imagen debe ser un archivo de tipo: jpeg, png, jpg, gif, svg',
            'image_url.max' => 'La imagen no debe ser mayor a 2MB',
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
        $image -> is_active = !$image -> is_active;
        $image -> modification_date = now();
        $image -> save();

        return redirect('/Image_Table');
    }
    

}

    
