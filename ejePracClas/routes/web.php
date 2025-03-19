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

Route::post('validar',[miControlador::class,'validarEntrada']);
Route::post('anadir', [miControlador::class,'basura']);

Route::get('validar', function () {
    return view('listado');
})->middleware('midSesion');

Route::post('registrar', [miControlador::class,'agregar']);

Route::post('edit', [miControlador::class,'edit']);
Route::post('delete', [miControlador::class,'delete']);

