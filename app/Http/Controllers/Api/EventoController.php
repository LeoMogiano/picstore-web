<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\Fotografia;
use App\Models\FotoUser;
use App\Models\Tarjeta;
use App\Models\User;
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

    public function getTarjetas($usuario_id)
    {
        $user = User::find($usuario_id);

        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        $tarjetas = Tarjeta::where('user_id', $usuario_id)->get();

        if ($tarjetas->isEmpty()) {
            return response()->json([], 204);
        }

        return response()->json(['tarjetas' => $tarjetas]);
    }

    public function buyFoto( $photoId, $userId, $cardId)
    {
        // Buscar la foto y la tarjeta en la base de datos
        $photo = Fotografia::findOrFail($photoId);
        $card = Tarjeta::findOrFail($cardId);

        // Verificar si el usuario ya compró la foto
        $userPhoto = FotoUser::where('user_id', $userId)
            ->where('foto_id', $photo->id)
            ->first();

        // Si el usuario ya compró la foto, actualizar su relación existente
        if ($userPhoto) {
            $userPhoto->tarjeta_id = $cardId;
            $userPhoto->estado = 'Comprado';
            $userPhoto->save();

            // Si el usuario no compró la foto, crear una nueva relación
        } else {
            $userPhoto = new FotoUser();
            $userPhoto->user_id = $userId;
            $userPhoto->foto_id = $photo->id;
            $userPhoto->tarjeta_id = $cardId;
            $userPhoto->estado = 'Comprado';
            $userPhoto->save();
        }

        // Actualizar la información de la tarjeta del usuario y del autor de la foto
        $card->gasto += $photo->precio;
        $card->save();

        $authorCard = Tarjeta::where('user_id', $photo->autor_id)->first();
        $authorCard->saldo += $photo->precio;
        $authorCard->save();

        // Retornar una respuesta JSON indicando que la compra se realizó con éxito
        return response()->json([
            'success' => true,
            'message' => 'La compra se realizó con éxito',
            'data' => [
                'photo_id' => $photo->id,
                'user_id' => $userId,
                'card_id' => $cardId,
            ],
        ]);
    }
}
