<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Fotografia;
use App\Models\FotoUser;
use App\Models\Suscripcion;
use App\Models\Tarjeta;
use App\Models\User;
use App\Models\UserEvento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::all();
        $user_eventos = UserEvento::all();

        return view('eventos.index', compact('eventos', 'user_eventos'));
    }

    public function create()
    {
        return view('eventos.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required', //Se valida el nombre en depreciaciones para que no se repitan antes de registrar una nueva
            'fecha' => 'required',
            'hora' => 'required',
            'tipo' => 'required',
            'lugar' => 'required',
            'direccion' => 'required',
        ]);

        $evento = new Evento();
        $evento->nombre    = $request->nombre;
        $evento->fecha     = $request->fecha;
        $evento->hora      = $request->hora;
        $evento->tipo      = $request->tipo;
        $evento->lugar     = $request->lugar;
        $evento->direccion = $request->direccion;
        
        $file = $request->file('imagen');

        if ($file) {

            $fileName = time() . $file->getClientOriginalName();
            // Especifica el directorio en Amazon S3 con el nombre de usuario y su ID
            $directory = 'user_' . Auth::user()->id;
            // Sube el archivo a Amazon S3 en el directorio del usuario
            Storage::disk('s3')->putFileAs($directory, $file, $fileName, 'public');
            // Obtén la URL del archivo en Amazon S3
            $fileUrl = Storage::disk('s3')->url($directory . '/' . $fileName);

            $evento->imagen  = $fileUrl;
        }
        
        $evento->org_id    = Auth::user()->id;
        $evento->save();


        return redirect()->route('eventos.index'); // Se redirige a la vista ubicaiones.index
    }

    public function edit($id)
    {
        $evento = Evento::find($id);
        $users = User::all();
        $user_eventos = UserEvento::all();
        $fotografias = Fotografia::where('evento_id', $evento->id)->get();
        $foto_users = FotoUser::all();
        return view('eventos.edit', compact('evento', 'users', 'user_eventos', 'fotografias', 'foto_users'));
    }

    public function update(Request $request, $id)
    {
        $evento = Evento::find($id);
        $evento->nombre    = $request->nombre;
        $evento->fecha     = $request->fecha;
        $evento->hora      = $request->hora;
        $evento->tipo      = $request->tipo;
        $evento->lugar     = $request->lugar;
        $evento->direccion = $request->direccion;
        $file = $request->file('imagen');
        if ($file) {

            $fileName = time() . $file->getClientOriginalName();
            // Especifica el directorio en Amazon S3 con el nombre de usuario y su ID
            $directory = 'user_' . Auth::user()->id;
            // Sube el archivo a Amazon S3 en el directorio del usuario
            Storage::disk('s3')->putFileAs($directory, $file, $fileName, 'public');
            // Obtén la URL del archivo en Amazon S3
            $fileUrl = Storage::disk('s3')->url($directory . '/' . $fileName);

            $evento->imagen  = $fileUrl;
        }
        $evento->org_id    = Auth::user()->id;
        $evento->save();

        
        return redirect()->route('eventos.index');
    }

    public function destroy(Request $request, $id)
    {
        $evento = Evento::find($id); 
        $evento->delete();
        return redirect()->back();
    }

    public function registerEvent($id)
    {   
        $suscrips = Suscripcion::all();
        $evento = $id;
        return view('eventos.register', compact('id', 'suscrips'));
    }

    public function registerEvento(Request $request, $id)
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
            'password' => ['required', 'min:5', 'max:20'],
            'rol' => ['required'],

            /* 'agreement' => ['accepted'] */
        ]);
        $attributes['password'] = bcrypt($attributes['password'] );
        $attributes['rol'] = request('rol');
        

        session()->flash('success', 'Su cuenta ha sido creada con éxito!');
        $user = User::create($attributes);
        
        $file = $request->file('photo1');

        if ($file) {

            $fileName = time() . $file->getClientOriginalName();
            // Especifica el directorio en Amazon S3 con el nombre de usuario y su ID
            $directory = 'user_' . $user->id;
            // Sube el archivo a Amazon S3 en el directorio del usuario
            Storage::disk('s3')->putFileAs($directory, $file, $fileName, 'public');
            // Obtén la URL del archivo en Amazon S3
            $fileUrl = Storage::disk('s3')->url($directory . '/' . $fileName);

            $user->photo1  = $fileUrl;
        }

        $file2 = $request->file('photo2');

        if ($file2) {

            $fileName = time() . $file2->getClientOriginalName();
            // Especifica el directorio en Amazon S3 con el nombre de usuario y su ID
            $directory = 'user_' . $user->id;
            // Sube el archivo a Amazon S3 en el directorio del usuario
            Storage::disk('s3')->putFileAs($directory, $file2, $fileName, 'public');
            // Obtén la URL del archivo en Amazon S3
            $fileUrl = Storage::disk('s3')->url($directory . '/' . $fileName);

            $user->photo2  = $fileUrl;
        }

        $user->save();
        

        $tar = new Tarjeta();
        $tar->numero = request('numero');
        $tar->nombre = request('name');
        $tar->saldo = 0.0;
        $tar->gasto = 0.0;
        $tar->fecha_v = request('fecha_v');
        $tar->cvc = request('cvc');
        $tar->user_id = $user->id;
        $tar->save();

        Auth::login($user); 

        
        $user_evento = new UserEvento();
        $user_evento->user_id = $user->id;
        $user_evento->evento_id =  $id;
        $user_evento->estado = 'Invitado';
        $user_evento->save();


        
        $evento = Evento::find($id);
        $users = User::all();
        $user_eventos = UserEvento::all();
        $fotografias = Fotografia::all();

        return view('eventos.edit', compact('evento', 'users', 'user_eventos', 'fotografias'));
    }

}
