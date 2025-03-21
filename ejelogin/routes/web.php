<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginControlador;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});
Route::post('accion', [loginControlador::class, 'accion']);
Route::post('registro', [loginControlador::class, 'insertar']);
Route::post('actualizar', [loginControlador::class, 'actualizarEliminarUsuario']);

// ruta nueva de prueba para el middleware
Route::get('anadir', function (){
    return view('registrar');
})->middleware('midSesion', 'midAdministrador');
