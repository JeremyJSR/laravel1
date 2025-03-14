<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formcontrolador;


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
    return view('formulario');
});

Route::post('vista', [formcontrolador::class,'validarEjercicio2fin']);

Route::post('vista1', [formcontrolador::class,'calcular']);
