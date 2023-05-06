<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'org_id',
        'nombre',
        'fecha',
        'hora',
        'tipo',
        'lugar',
        'direccion',
        'imagen'
    ];

    protected $dates = [
        'fecha',
        'hora'
    ];
}
