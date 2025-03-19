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
        if($accion == 'Acceder'){
            $ema = $req->get('correo');
            $pass = $req->get('pass');
            $pers = Persona::where('email', $ema)->first();
            if($pers->email == $ema && $pers->pass == $pass){
                $pers = Persona::all();
                // session()->get('nombre')
                $datos = [
                    'personas' => $pers,
                    'mensaje' => 'yoxd'
                ];
                return view('acceso', $datos);
            }else{
                return view('validar', ['mensaje' => 'Error Vuelve a intentarlo']);
            }

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
