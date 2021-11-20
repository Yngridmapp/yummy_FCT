<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table('recipes')->insert([
            'title' => $faker->sentence(1),
            'category_id' => Category::inRandomOrder()->limit(1)->get()->First()->id,
            'ingredient' => $faker->text(100),
            'preparation' => $faker->text(500),
            'created_at' => $faker->dateTimeThisMonth(),
            'user_id' => User::inRandomOrder()->limit(1)->get()->First()->id,
        ]);
    }
}
