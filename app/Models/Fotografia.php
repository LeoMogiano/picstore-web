<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotografia extends Model
{
    use HasFactory;

    protected $table = 'fotografias';
    protected $fillable = ['foto', 'foto_c', 'autor_id', 'precio','tipo', 'evento_id'];

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }
}
