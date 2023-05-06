<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{
    use HasFactory;

    protected $table = 'suscripciones';
    protected $fillable = [
        'nombre',
        'precio',
        'logo',
        'funciones'
    ];

    protected $casts = [
        'precio' => 'float',
        'funciones' => 'array' 
    ];
}
