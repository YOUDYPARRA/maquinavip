<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class MaquineroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('maquineros')->insert([
            'id_modelo'=>'13',
            'talla'=>'talla',
            'cantidad'=>'cantidad',
            'nombre'=>'nombre',
            'hilo_recta'=>'hilo_recta',
            'hilo_over'=>'hilo_over',
            'observacion'=>'observacion',
            'tipo'=>'tipo',
        ]);
    }
}
