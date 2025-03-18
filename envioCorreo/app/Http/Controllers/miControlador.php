<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class miControlador extends Controller
{
    public function enviarCorreo(Request $req)
    {
        $datos = [
            'obs' => $req->get('observaciones')
        ];

        $email = $req->get('correo_destino');

        // Le mando la vista 'welcome' como cuerpo del correo.
        Mail::send('correo', $datos, function($message) use ($email) { // Arreglado $menssage a $message
            $message->to($email)->subject('Ejemplo de envio');
            $message->from('sepecamvdg@gmail.com', 'Mi aplicacion Laravel'); // Falta ; agregado
        });

        return view('welcome');
    }
}
