<?php

namespace Database\Seeders;

use App\Models\Category;
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
        //Para que funcionen los seeder debo incluirlos en DatabaseSeeder.
        //Se programa el orden de ejecución de los Seeders
        $this->call([
            RolSeeder::class,
            CategorySeeder::class,
            UserSeeder::class,
            RecipeSeeder::class

            
        ]);
    }
}
