<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\miControl;
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

Route::get('indice', function () {
    return view('welcome');
});

Route::get('listarA', [miControl::class, 'listar_a']);
Route::get('listarB', [miControl::class, 'listar_b']);
Route::get('listarC', [miControl::class, 'listar_c']);
Route::get('insertar', [miControl::class, 'insertar']);
Route::get('modificar', [miControl::class, 'modificar']);
Route::get('eliminar', [miControl::class, 'eliminar']);

Route::get('eloquent', function(){
    return view('formularioPersona');
});
Route::post('validar', [miControl::class, 'validar']);


Route::get('eloquent2', function(){
    return view('formularioCoches');
});
Route::post('validarC', [miControl::class, 'validarCoches']);
