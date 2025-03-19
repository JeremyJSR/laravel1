<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class miControlador extends Controller
{
    //
    public function validarEntrada(Request $req){
        $login = $req->get('login');
        $pwd = $req->get('pwd');

        $usuario = Usuario::where('login',$login)
        ->where('password',$pwd)
        ->first();

        if ($usuario) {
            //Guardamos en la sesión el usuario
            session()->put('usuario',$usuario);
            //Obtengo el listado de todos los usuarios
            $usuarios = Usuario::all();
            $datos = [
                'usuarios' => $usuarios
            ];
            //Se devuelve la vista del listado pasándole como parámetro
            //los usuarios que haya en la BD
            return view('listado',$datos);
        } else {
            return view('welcome',['mensaje'=>'Credenciales incorrectas.']);
        }
    }
    public function basura(Request $req){
        $anadir = $req->get('accion');
        if($anadir == 'add'){
            return view('registrar');
        }
    }
    public function agregar(Request $req){
        $volver = $req->get('volver');
        $registrar = $req->get('registrar');
        if($registrar){
            $nom = $req->get('nombre');
            $ema = $req->get('email');
            $pass = $req->get('pass');

            $per = new Usuario;
            $per->login = $nom;
            $per->email = $ema;
            $per->password = $pass;
            $usuario = Usuario::all();
            $datos = [
                'usuarios' => $usuario
            ];
            try {
                $per->save();
                return view('listado', $datos);
            } catch (\Exception $e){
                $mensaje = ' Clave duplicada';
                return view('error', ['mensaje' => $mensaje]);
            }
        }
        if($volver){
            return view('listado');
        }
    }
    public function delete(Request $req){
        $id = $req->get('id');
        $usuario = Usuario:: find($id);

        if($usuario){
            $usuario->delete();
            $usuario = Usuario::all();
            $datos = [
                'usuarios' => $usuario
            ];
            return view('listado', $datos);
        }
    }
    // public function
}
