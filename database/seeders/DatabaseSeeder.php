<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(1)->create();
        \App\Models\Usuario::factory(1)->create();
        \App\Models\UserUsuario::factory(1)->create();
        \App\Models\Modelo::factory(1)->create();
        \App\Models\Almacen::factory(1)->create();
        \App\Models\Vehiculo::factory(1)->create();
    }
}
