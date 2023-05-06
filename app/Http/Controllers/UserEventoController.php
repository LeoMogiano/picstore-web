<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Portafolio;
use App\Models\User;
use App\Models\UserEvento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserEventoController extends Controller
{

    public function index()
    {
        $users = User::all();
        $eventos = Evento::all();
        $user_eventos = UserEvento::all(); 
        return view('user_evento.index', compact('users', 'user_eventos', 'eventos'));
    }

    public function create($evento_id)
    {
        /* $fotografos =  */
        $users = User::all();
        $portafolios = Portafolio::all();
        $user_eventos = UserEvento::all();
        $evento = Evento::where('id', $evento_id)->first();
        return view('user_evento.create', compact('evento_id', 'users', 'portafolios', 'user_eventos', 'evento'));
    }

    public function store(Request $request)
    {
        $evento_id = $request->input('evento_id');
        $user_id = $request->input('user_id');
        $user_evento = new UserEvento();
        $user_evento->estado = 'Pendiente';
        $user_evento->evento_id = $evento_id;
        $user_evento->user_id = $user_id;
        $user_evento->save();

        return redirect()->route('eventos.edit', $evento_id);
    }

    public function estado(Request $request)
    {
        $estado = $request->input('estado');
        $user_evento_id = $request->input('user_evento_id');
        $user_id = $request->input('user_id');
        $user_evento = UserEvento::where('user_id', $user_id)->where('evento_id', $user_evento_id)->first();
        $user_evento->estado = $estado;
        $user_evento->save();

        return redirect()->back();
    }

    public function show_user(Request $request)
    {
       
        $evento_id = $request->input('evento_id');
        $user = User::find($request->input('user_id'));
       
        return view('eventos.show_user', compact('user', 'evento_id'));
    }


}
