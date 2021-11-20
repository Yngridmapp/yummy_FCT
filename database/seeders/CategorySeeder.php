<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Desayunos', 'Postres', 'Entrantes', 'Guarnición', 'Sopas', 'Carnes', 'Pastas', 'Ensaladas', 'Platos combinados', 'Picatostes'];
        for ($i = 0; $i < sizeof($categories); $i++) {
            DB::table('categories')->insert(['category' => $categories[$i]]);
        }
    }
}
