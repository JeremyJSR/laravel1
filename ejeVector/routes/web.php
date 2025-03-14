<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\vectorControlador;
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
    return view('lista');
});

Route::post('anadir', [vectorControlador::class, 'addNumero']);

Route::post('modificar', [vectorControlador::class, 'modNumero']);



