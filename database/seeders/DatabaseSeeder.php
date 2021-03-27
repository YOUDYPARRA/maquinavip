<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  \App\Models\User::factory(10)->create();
        \App\Models\alumnos::factory()->create();
        // DB::table('alumnos')->insert([
        //     'nombre'=>'nombre',
        //     'apellido_paterno'=>'apellido_paterno',
        //     'apellido_materno'=>'apellido_materno',
        //     'id_grupo'=>'id_grupo',
        //     'fecha_nacimiento'=>'10/11/2021',
        //     'equipo'=>'equipo',
        //     'observacion'=>'observacion',
        //     'correo' =>'correo',
        // ]);


    }
}
