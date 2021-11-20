<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rols')->insert([
            'type' => 'administrador',
            'description' => 'Información adicional sobre el administrador'
        ]);
        DB::table('rols')->insert([
            'type' => 'regular',
            'description' => 'Información adicional sobre los usuarios regulares'
        ]);

    }
}
