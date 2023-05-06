<?php

namespace App\Http\Controllers;

use App\Models\Fotografia;
use App\Models\FotoUser;
use App\Models\Portafolio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\View;

class InfoUserController extends Controller
{

    public function create()
    {
        $user = Auth::user();
        $portafolios = Portafolio::where('user_id', $user->id)->get();
        
        $fotous = FotoUser::where('user_id', Auth::user()->id)->get();
        $fotos = Fotografia::all();

        

        return view('laravel-examples/user-profile', compact('portafolios', 'user', 'fotos', 'fotous'));
    }

    public function store(Request $request)

    {

        request()->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
            'ci' => ['max:12'],
            'phone'     => ['max:50'],
            'location' => ['max:70'],
            'about_me'    => ['max:150'],
            'password' => ['nullable', 'min:8'],
            'photo1' => ['nullable', 'image', 'max:2048'],
            'photo2' => ['nullable', 'image', 'max:2048'],
        ]);

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email  = $request->input('email');
        $user->ci  = $request->input('ci');
        $user->phone  = $request->input('phone');
        $user->location  = $request->input('location');
        $user->about_me  = $request->input('about_me');

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

        if ($request->filled('password')) { // Verifica si el campo de contraseña está presente
            // Actualiza la contraseña en la base de datos en caso de que se haya proporcionado
            User::where('id', Auth::user()->id)
                ->update([
                    'password' => bcrypt($request->input('password'))
                ]);
        }


        /* $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
            'ci' => ['max:12'],
            'phone'     => ['max:50'],
            'location' => ['max:70'],
            'about_me'    => ['max:150'],
            'password' => ['nullable', 'min:8'],
            'photo1' => ['nullable'],
        ]);

        // Obtén el archivo de la solicitud
        $file = $request->file('photo1');

        
        

        if ($file->isValid()) { // Verificar si el archivo es válido

            return 'hola';
            // Genera un nombre único para el archivo
            $fileName = uniqid();
            // Especifica el directorio en Amazon S3 con el nombre de usuario y su ID
            $directory = 'user_' . auth()->user()->id;
            // Sube el archivo a Amazon S3 en el directorio del usuario
            Storage::disk('s3')->putFileAs($directory, $file, $fileName, 'public');
            // Obtén la URL del archivo en Amazon S3
            $fileUrl = Storage::disk('s3')->url($directory . '/' . $fileName);

            // Actualiza la información del usuario con la URL de la foto subida
            User::where('id', auth()->user()->id)
                ->update([
                    'name' => $attributes['name'],
                    'email' => $attributes['email'],
                    'phone' => $attributes['phone'],
                    'location' => $attributes['location'],
                    'about_me' => $attributes["about_me"],
                    'ci' => $attributes["ci"],
                    'photo1' => $fileUrl,
                ]);
        } else {
            // Actualiza la información del usuario sin la URL de la foto
            User::where('id', auth()->user()->id)
                ->update([
                    'name' => $attributes['name'],
                    'email' => $attributes['email'],
                    'phone' => $attributes['phone'],
                    'location' => $attributes['location'],
                    'about_me' => $attributes["about_me"],
                    'ci' => $attributes["ci"],
                ]);
        }  */
        return redirect('/user-profile')->with('success', '¡Perfil actualizado exitosamente!');
    }
}
