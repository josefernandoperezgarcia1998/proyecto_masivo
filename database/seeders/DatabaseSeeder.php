<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'José Fernando Pérez García',
            'email' => 'josefernandoperezgarcia98@gmail.com',
            'rol' => 'Administrador',
            'estado' => 'Si',
            'password' => bcrypt('123'),
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'rol' => 'Administrador',
            'estado' => 'Si',
            'password' => bcrypt('123'),
        ]);
    }
}
