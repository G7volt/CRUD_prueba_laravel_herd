<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';

    protected function casts(): array
    {
        return [
            'creation_date' => 'datetime',//Toma el campo de 'creation_date' y hace que Carbon lo considere como tipo datetime en vez de string.
            'modification_date' => 'datetime',
            'is_active' => 'boolean'
        ];
    }

    protected function images_url(): Attribute 
    {
        return Attribute::make(
            
            // Al LEER — convierte a URL completa
            get: fn (string $value) => asset('storage/' . $value),

            // Al GUARDAR — guarda solo el nombre relativo
            set: fn (string $value) => str_replace('storage/', '', $value),
        );
    }
}
