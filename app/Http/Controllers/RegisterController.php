<?php

namespace App\Http\Controllers;

use App\Models\Suscripcion;
use App\Models\Tarjeta;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class RegisterController extends Controller
{
    public function create()
    {
        $suscrips = Suscripcion::all();
        return view('session.register', compact('suscrips'));
    }

    public function store(Request $request)
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
        $tar->fecha_v = request('fecha_v');
        $tar->cvc = request('cvc');
        $tar->user_id = $user->id;
        $tar->saldo = 0;
        $tar->gasto = 0;
        $tar->save();

        Auth::login($user); 
        return redirect('/dashboard');
    }
}
