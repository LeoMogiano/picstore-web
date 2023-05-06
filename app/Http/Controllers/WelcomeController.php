<?php

namespace App\Http\Controllers;

use App\Models\Suscripcion;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $suscrips = Suscripcion::all();
        return view('welcome', compact('suscrips'));
    }
}
