<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; //bucket

class DiskController extends Controller
{
    public function index() 
    {
        Storage::put('text2.txt', 'Hello mogi-bucket!');
    }
}
