<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEvento extends Model
{
    use HasFactory;

    protected $table = 'user_evento';
    protected $fillable = ['user_id', 'evento_id', 'estado'];

    public function invitado()
    {
        return $this->belongsTo(User::class, 'invitado_id');
    }

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }
}
