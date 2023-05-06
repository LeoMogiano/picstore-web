<?php

namespace Database\Seeders;

use App\Models\Evento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Evento::create([
            'nombre' => 'Conferencia de Desarrollo Web',
            'fecha' => '2023-05-15',
            'hora' => '10:00',
            'tipo' => 'Conferencia',
            'lugar' => 'Salón Principal',
            'direccion' => '123 Calle Principal',
            'imagen' => 'https://mogi-aws-bucket.s3.amazonaws.com/user_3/1683214155desarrolloweb.jpg',
            'org_id' => 3
        ]);

        Evento::create([
            'nombre' => 'Lanzamiento de Producto',
            'fecha' => '2023-07-10',
            'hora' => '18:00',
            'tipo' => 'Evento de Negocios',
            'lugar' => 'Centro de Convenciones',
            'direccion' => '789 Calle Comercial',
            'imagen' => 'https://mogi-aws-bucket.s3.amazonaws.com/user_3/1683214223lanzamiento.jpg',
            'org_id' => 3
        ]);

        Evento::create([
            'nombre' => 'Maratón de Ciudad',
            'fecha' => '2023-08-05',
            'hora' => '06:00',
            'tipo' => 'Deportivo',
            'lugar' => 'Ciudad Deportiva',
            'direccion' => '101 Calle Deportiva',
            'imagen' => 'https://mogi-aws-bucket.s3.amazonaws.com/user_3/1683214314maraton.jpg',
            'org_id' => 3
        ]);
    }
}
