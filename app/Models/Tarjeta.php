<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    use HasFactory;

    protected $fillable = ['numero', 'nombre', 'fecha_v', 'cvc', 'user_id', 'saldo', 'gasto'];

    protected $dates = [
        'fecha_v',
    ];

    // Relación muchos a uno con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
