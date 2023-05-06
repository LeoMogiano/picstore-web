<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@softui.com',
            'password' => Hash::make('secret'),
            'rol' => 'Administrador',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Leo Mogiano',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('leo123123'),
            'rol' => 'Administrador',
            'created_at' => now(),
            'updated_at' => now()
        ]);
      
        DB::table('users')->insert([
            'id' => 3,
            'name' => 'Fernando Organizador',
            'email' => 'fer@gmail.com',
            'password' => Hash::make('leo123123'),
            'rol' => 'Organizador',
            'ci' => '6790845 SC',
            'phone' => 62158745,
            'location' => 'Santa Cruz de la Sierra, Bolivia',
            'about_me' => 'Un organizador de eventos. Dueño de un club de lucha clandestino.',
            'photo1' => 'https://mogi-aws-bucket.s3.amazonaws.com/user_3/1683209860fernando.jpg',
            'photo2' => 'https://mogi-aws-bucket.s3.amazonaws.com/user_3/1683209862fernando2.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 4,
            'name' => 'Ryan Invitado',
            'email' => 'ryan@gmail.com',
            'password' => Hash::make('leo123123'),
            'rol' => 'Invitado',
            'ci' => '6357805 SC',
            'phone' => 62789556,
            'location' => 'Santa Cruz de la Sierra, Bolivia',
            'about_me' => 'Ryan Thomas Gosling es un actor y músico canadiense.',
            'photo1' => 'https://mogi-aws-bucket.s3.amazonaws.com/user_4/1683211142ryan2.jpg',
            'photo2' => 'https://mogi-aws-bucket.s3.amazonaws.com/user_4/1683211143ryang.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 5,
            'name' => 'Michael Fotógrafo',
            'email' => 'michael@gmail.com',
            'password' => Hash::make('leo123123'),
            'rol' => 'Fotografo',
            'ci' => '6280512 SC',
            'phone' => 71112509,
            'location' => 'Santa Cruz de la Sierra, Bolivia',
            'about_me' => 'Me desempeño como fotógrafo regional de la sucursal de Scranton, Pensilvania, de la compañía de papel Dunder.',
            'photo1' => 'https://mogi-aws-bucket.s3.amazonaws.com/user_5/1683210230michael.jpg',
            'photo2' => 'https://mogi-aws-bucket.s3.amazonaws.com/user_5/1683210231michael2.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 6,
            'name' => 'Brad Pitt',
            'email' => 'brad@gmail.com',
            'password' => Hash::make('leo123123'),
            'rol' => 'Fotografo',
            'ci' => '67908945 SC',
            'phone' => 62152145,
            'location' => 'Santa Cruz de la Sierra, Bolivia',
            'about_me' => 'Soy un actor, modelo y productor de cine estadounidense.',
            'photo1' => 'https://mogi-aws-bucket.s3.amazonaws.com/user_7/1683211406Brad.jpg',
            'photo2' => 'https://mogi-aws-bucket.s3.amazonaws.com/user_7/1683211407brad2.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 7,
            'name' => 'Ana de Armas',
            'email' => 'ana@gmail.com',
            'password' => Hash::make('leo123123'),
            'rol' => 'Invitado',
            'ci' => '1790845 SC',
            'phone' => 62124545,
            'location' => 'Santa Cruz de la Sierra, Bolivia',
            'about_me' => 'Soy Ana Celia de Armas Caso, más conocida como Ana de Armas, es una actriz cubana-española.',
            'photo1' => 'https://mogi-aws-bucket.s3.amazonaws.com/user_8/1683211660ana.jpg',
            'photo2' => 'https://mogi-aws-bucket.s3.amazonaws.com/user_8/1683211661ana2.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
    }
}
