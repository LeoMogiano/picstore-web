<?php

namespace Database\Seeders;

use App\Models\Portafolio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortafolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Portafolio::create([
            'foto' => 'https://mogi-aws-bucket.s3.amazonaws.com/user_5/1683213014portafolio1.jpg',
            'user_id' => 5
        ]);
        
        Portafolio::create([
            'foto' => 'https://mogi-aws-bucket.s3.amazonaws.com/user_5/1683213022portafolio2.jpg',
            'user_id' => 5
        ]);

        Portafolio::create([
            'foto' => 'https://mogi-aws-bucket.s3.amazonaws.com/user_5/1683213033portafolio3.jpg',
            'user_id' => 5
        ]);

        Portafolio::create([
            'foto' => 'https://mogi-aws-bucket.s3.amazonaws.com/user_7/1683223283porta1.jpeg',
            'user_id' => 6
        ]);

        Portafolio::create([
            'foto' => 'https://mogi-aws-bucket.s3.amazonaws.com/user_7/1683223386porta2.jpg',
            'user_id' => 6
        ]);

        Portafolio::create([
            'foto' => 'https://mogi-aws-bucket.s3.amazonaws.com/user_7/1683223395porta3.jpg',
            'user_id' => 6
        ]);
        
    }
}
