<?php

namespace App\Http\Controllers;

use App\Models\Portafolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PortafolioController extends Controller
{
    public function store(Request $request)
    
    {
        $portafolio = new Portafolio();
        $user = Auth::user();
        $portafolio->user_id = $user->id;

        $file = $request->file('foto');

        if ($file) {

            $fileName = time() . $file->getClientOriginalName();
            // Especifica el directorio en Amazon S3 con el nombre de usuario y su ID
            $directory = 'user_' . $user->id;
            // Sube el archivo a Amazon S3 en el directorio del usuario
            Storage::disk('s3')->putFileAs($directory, $file, $fileName, 'public');
            // Obtén la URL del archivo en Amazon S3
            $fileUrl = Storage::disk('s3')->url($directory . '/' . $fileName);

            $portafolio->foto  = $fileUrl;
        }

        $portafolio->save();

        return redirect()->back();
    }



        
}
