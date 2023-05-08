<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\Fotografia;
use App\Models\FotoUser;
use App\Models\UserEvento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function eventosPorUsuario($idUsuario)
    {
        $userEventos = UserEvento::where('user_id', $idUsuario)->get();
        $eventos = [];

        foreach ($userEventos as $userEvento) {
            $evento = Evento::where('id', $userEvento->evento_id)->first();
            $eventos[] = $evento;
        }

        if (empty($eventos)) {
            return response()->json([], 204);
        }

        return response()->json([
            'eventos' => $eventos
        ]);
    }

    public function getFotosEvento($evento_id, $usuario_id)
    {
        $evento = Evento::find($evento_id);

        if (!$evento) {
            return response()->json(['error' => 'Evento no encontrado'], 404);
        }

        $fotos = Fotografia::where('evento_id', $evento_id)->get();

        $fotos_resultado = [];

        foreach ($fotos as $foto) {
            if ($foto->tipo == 'Publico') {
                $fotos_resultado[] = $foto;
            } else {
                $validacion = FotoUser::where('foto_id', $foto->id)
                    ->where('user_id', $usuario_id)
                    ->first();

                if ($validacion) {
                    $fotos_resultado[] = $foto;
                }
            }
        }

        if (empty($fotos_resultado)) {
            return response()->json([], 204);
        }

        return response()->json(['fotos' => $fotos_resultado]);
    }
    
    public function getFotosComprada($usuario_id)
    {
        $fotos = Fotografia::all();
        $foto_users = FotoUser::where('estado', 'Comprado')->where('user_id', $usuario_id)->get();

        if ($foto_users->isEmpty()) {
            return response()->json([], 204);
        }

        $fotos_resultado = [];

        foreach ($fotos as $foto) {
            if ($foto_users->contains('foto_id', $foto->id)) {
                $fotos_resultado[] = $foto;
            }
        }

        return response()->json(['fotos' => $fotos_resultado]);
    }
}
