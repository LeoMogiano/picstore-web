<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EventoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
    
Route::post('login', [AuthController::class, 'login']);
/* Route::get('/usuarios/{id}/eventos', 'Api\EventoController@eventosPorUsuario'); */
/* Route::middleware('auth:api')->get('/usuarios/{id}/eventos', 'Api\EventoController@eventosPorUsuario'); */
Route::get('/usuarios/{id}/eventos', [EventoController::class, 'eventosPorUsuario']);
Route::get('/eventos/{evento_id}/fotos/{usuario_id}', [EventoController::class, 'getFotosEvento']);
Route::get('/fotos/compradas/{usuario_id}', [EventoController::class, 'getFotosComprada']);
