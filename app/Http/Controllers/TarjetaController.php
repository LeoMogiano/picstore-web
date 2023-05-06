<?php

namespace App\Http\Controllers;

use App\Models\Fotografia;
use App\Models\FotoUser;
use App\Models\Tarjeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TarjetaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $tar = Tarjeta::where('user_id', $user->id)->first();
        $tarjetas = Tarjeta::where('user_id', $user->id)->get();
        //fotografo
        $ffotos = Fotografia::where('autor_id', $user->id)->get();
        $ffoto_users = FotoUser::where('estado', 'Comprado')->take(5)->get();

        $ifotos = Fotografia::all();
        $ifoto_users = FotoUser::where('estado', 'Comprado')->take(5)->get();


        return view('tarjetas.index', compact('user', 'tarjetas', 'tar', 'ffotos',  'ffoto_users', 'ifotos',  'ifoto_users'));
    }

    public function create()
    {
        return view('tarjetas.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'numero' => 'required',
            'nombre' => 'required',
            'fecha_v' => 'required|date',
            'cvc' => 'required',
        ]);

        $tar = new Tarjeta();
        $tar->numero = $request->input('numero');
        $tar->nombre = $request->input('name');
        $tar->fecha_v = $request->input('fecha_v');
        $tar->cvc = $request->input('cvc');
        $tar->user_id = Auth::user()->id;

        $tar->save();

        return redirect()->route('tarjetas.index'); // Reemplazar 'ruta.nombre' con la ruta deseada para la vista de éxito
    }

    public function recibo()
    {
        $user = Auth::user();
        $ffotos = Fotografia::where('autor_id', $user->id)->get();
        $ffoto_users = FotoUser::where('estado', 'Comprado')->get();
        /* return $ffoto_users; */
        $ifotos = Fotografia::all();
        $ifoto_users = FotoUser::where('estado', 'Comprado')->get();

        return view('tarjetas.recibos', compact('ffotos', 'ffoto_users', 'ifotos', 'ifoto_users'));
    }
}
