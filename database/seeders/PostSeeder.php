<?php

namespace Database\Seeders;

use App\Http\Controllers\PostController;
use App\Models\Post;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post = new Post();

        $post -> title = 'Post 1';
        $post -> content = 'Contenido del post 1';
        $post -> category = 'Categoria 1';
        $post -> published_at = now(); //EL formato para colocar manualmente la fecha es de AA-MM-DD HH-MM-SS
        //$post -> timestamps = now();

        $post -> save();

        $post = new Post();

        $post -> title = 'Post 2';
        $post -> content = 'Contenido del post 2';
        $post -> category = 'Categoria 2';
        $post -> published_at = now(); //EL formato para colocar manualmente la fecha es de AA-MM-DD HH-MM-SS
        //$post -> timestamps = now();

        $post -> save();
    }
}
