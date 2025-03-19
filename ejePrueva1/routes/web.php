<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\miControlador;
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
    return view('validar');
});
Route::post('validar', [miControlador::class,'validacion']);
Route::get('validar', function () {
    return view('vertodos');
})->middleware('midSesion');


Route::post('registrar', [miControlador::class,'agregar']);
