<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoUser extends Model
{
    use HasFactory;

    protected $table = 'foto_user';

    protected $fillable = [
        'estado',  // Sin Comprar o Comprado
        'foto_id',
        'tarjeta_id',
        'user_id',
    ];

    public function foto()
    {
        return $this->belongsTo(Fotografia::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
