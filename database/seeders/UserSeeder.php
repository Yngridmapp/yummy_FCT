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
        // $datos_usuario = ['usuario1' => ['Julia','Ruiz','mail1@mail.com','selfie1.png',"2"],
        //                 'usuario2' => ['Jorge','Barbosa','mail2@mail.com','selfie3.jpg',"2"],
        //                 'usuario3' => ['Yngrid','Martinez','madmad@gmail.com','selfie4.jpg',"1"],
        //                 'usuario4' => ['Daniel','Pose','mail3@mail.com','selfie2.jpg',"2"],
        //                 'usuario5' => ['Ana','Pose','mail4@mail.com','selfie2.jpg',"2"],
        //                 'usuario6' => ['Ana','Lopez','mail9@mail.com','selfie2.jpg',"2"],
        //                 'usuario7' => ['Juan','Barbosa','mail5@mail.com','selfie3.jpg',"2"],
        //                 'usuario8' => ['Pepa','Marín','mail6@mail.com','selfie2.jpg',"2"],
        //                 'usuario9' => ['Lucía','Marín','mail7@mail.com','selfie2.jpg',"2"],
        //                 'usuario10' => ['Lucía','Ruiz','mail8@mail.com','selfie2.jpg',"2"]];

        //Usario administrador
        DB::table('users')->insert([
            'name' => 'Yngrid',
            'last_name' => 'Martinez',
            'email' => 'madmad@gmail.com',
            'selfie' => 'selfie4.jpg',
            'password' => Hash::make("abc123456."),
            'rol_id' => '1'
        ]);
        //Bucle de 30 usuarios regulares
        for($i = 0; $i<=30;$i++){
            DB::table('users')->insert([
                'name' => "usuario$i",
                'last_name' => "apellido$i",
                'email' => "mail$i@gmail.com",
                'selfie' => "selfie1.png",
                'password' => Hash::make("abc123456."),
                'rol_id' => "2"
            ]);
        }
        
    }
}