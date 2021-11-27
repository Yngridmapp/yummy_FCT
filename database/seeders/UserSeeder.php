<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $datos_usuario = ['usuario1' => ['Julia','Ruiz','mail1@mail.com','selfie1.png'],
                        'usuario2' => ['Jorge','Barbosa','mail2@mail.com','selfie3.jpg'],
                        'usuario3' => ['Yngrid','Martinez','madmad@gmail.com','selfie4.jpg'],
                        'usuario4' => ['Daniel','Pose','mail3@mail.com','selfie2.jpg']];
        foreach($datos_usuario as $dato => $valor){
            DB::table('users')->insert([
                'name' => $valor[0],
                'last_name' => $valor[1],
                'email' => $valor[2],
                'selfie' => $valor[3],
                'password' => Hash::make("abc123456."),
                'rol_id' => '2'
            ]);
        }
        
    }
}
