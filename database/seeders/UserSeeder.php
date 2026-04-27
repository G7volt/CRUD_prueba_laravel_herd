<?php

namespace Database\Seeders;

use App\Models\User;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


//Seeder: Me permite guardar registros y siempre tener registros a la hora de reiniciar la migracion de datos
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User;

        $user->name = 'Christopher Sanchez';
        $user -> email = 'diegsanchez27@gmail.com';
        $user -> password = bcrypt('kkenosis07');

        $user->save();

        $user = new User;

        $user->name = 'Daniel Regalado';
        $user -> email = 'daniRegalado@gmail.com';
        $user -> password = bcrypt('123456789');

        $user->save();
    }
}
