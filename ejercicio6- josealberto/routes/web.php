<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\miControlador;

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
    return view('welcome');
});

Route::post('comprobar',[miControlador::class,'comprobarUsuario']);
Route::post('registrar',[miControlador::class,'addUsuario']);
Route::post('actualizar',[miControlador::class,'updateDeleteUsuario']);
