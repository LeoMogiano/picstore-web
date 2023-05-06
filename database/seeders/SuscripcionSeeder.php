<?php

namespace Database\Seeders;

use App\Models\Suscripcion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuscripcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Suscripcion::create([
            'nombre' => 'Organizador',
            'precio' => '6.0',
            'logo'   => 'img/organizador.png',
            'funciones' => ['Crear eventos', 'Contratar fotografos para eventos', 'Administracion de fotos del evento', 'QR del evento para invitados' ]    
        ]);

        Suscripcion::create([
            'nombre' => 'Fotografo',
            'precio' => '9.0',
            'logo'   => 'img/fotografo.png',
            'funciones' => ['Ser contratado para un evento', 'Alerta de trabajo', 'Vender fotos del evento', ]         
        ]);

        Suscripcion::create([
            'nombre' => 'Invitado',
            'precio' => '0.0',
            'logo'   => 'img/invitado.png',
            'funciones' => ['Ver catalogo de fotos del evento asistido', 'Alerta en fotos donde apareces', 'Comprar Fotos', ]   
        ]);


    }
}
