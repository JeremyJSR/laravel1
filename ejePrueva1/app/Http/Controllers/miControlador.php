<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class miControlador extends Controller
{
    public function validacion(Request $req){
        $accion = $req->get('accion');

        if($accion == "Ver todos"){
            $personas = Persona::all();
            $datos = [
                'personas' => $personas,
                'mensaje' => 'Estas son todas las personas encontradas inicias session para modificar o eliminar registros.'
            ];
            return view('vertodo', $datos);
        }

        if($accion == 'Registrar'){
            return view('registrar');
        }
    }

    public function agregar(Request $req){

        if($req->get('registrar')){
            $nom = $req->get('nombre');
            $ema = $req->get('email');
            $pass = $req->get('pass');

            $per = new Persona;
            $per->nombre = $nom;
            $per->email = $ema;
            $per->pass = $pass;
            try {
                $per->save();
                return view('validar');
            } catch (\Exception $e){
                $mensaje = ' Clave duplicada';
                return view('error', ['mensaje' => $mensaje]);
            }
        }
        if($req->get('volver')){
            return view('validar');
        }
    }
}
