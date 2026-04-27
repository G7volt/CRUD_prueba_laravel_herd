<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    //Si no se le pasa ningun tabla, el sistema supondra que la tabla que le pasamos es la misma con el nombre 'Post'

    use HasFactory;

    //casting: permite transformar datos del modelo Eloquent a un tipo de dato especifico sin definir mutadores o accesores
    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',//Toma el campo de 'published_at' y hace que Carbon lo considere como tipo datetime en vez de string.
            'is_active' => 'boolean'
        ];
    }


    //protected $table = 'posts';

    //Mutadores: mutan los valores antes de almacenarlos.
    protected function title(): Attribute
    {
        return Attribute::make(
            set: function($value){
                return strtolower($value);
                //funcion para poner todas las letras del valor insertado en minusculas.
            }, 
            //Accesor: modifica el valor antes de acceder a el
            get: function($value){
                return ucfirst($value);
                //funcion para modificar el valor insertado y devolverlo con la primera letra en mayuscula.
            }
        );
    }

    //Casting: transforman la forma en la cual se ingresa y recupera informacion en las tablas
}
