<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class loginControlador extends Controller
{
    public function accion(Request $req){
        $acceso = $req->get('acceder');
        $registrar = $req->get('registrar');

        if($acceso){
            $email = $req->get('email');
            $pass = $req->get('pass');
            $usuario = Usuario::where('email', $email)->first();
            dd($usuario);

            if($usuario && Hash::check($pass, $usuario->pass)){
                $datos = [
                    'usuario' => $usuario
                ];
                return view('acceso', $datos);
            }else{
                return view('login', ['mensaje'=> 'Datos incorrectos']);
            }

        }
        if($registrar){
            return view('registrar');
        }
    }
    public function insertar(Request $req){
        if($req->has('guardar')){
            $ema = $req->get('email');
            $nom = $req->get('nombre');
            $edad = $req->get('edad');
            // $pass = $req->get('pass');
            $passEncrip = Hash::make($req->get('pass'));



            $usu = new Usuario;
            $usu->email = $ema;
            $usu->nombre = $nom;
            $usu->edad = $edad;
            $usu->pass = $passEncrip;
            try {
                // DB::insert('insert into usuarios (email, nombre, edad, pass) values (?, ?, ?, ?)',
                // [$req->get('email'), $req->get('nombre'), $req->get('edad'), $passEncrip]);
                $usu->save();
                return view('login');
            }
            catch (\Illuminate\Database\QueryException $e){
                return view('error', ['mensaje' => $e->getMessage()]); // Cambiado getMessage()
            }
            catch (\ErroException $e){
                return view('error', ['mensaje'=>'La operacion no se ha podido realizar']);
            }
        }else {
            return view('login');
        }
    }
    public function actualizarEliminarUsuario(Request $req){
        $email = $req->get('email');
        $usu = Usuario::find($email);

        if($req->has('modificar')){
            if($usu){

                try {
                    $usu->nombre = $req->get('nombre');
                    $usu->edad = $req->get('edad');
                    $usu->save();
                    // return view('');
                }
                catch(\Illuminate\Database\QueryException $e){
                    return view('error',['mensaje'=>'El registro no ha sido insertado'.$e->getCode()]);
                }
            }
        } else {
            try{
                $usu->delete();
            }catch(\Illuminate\Database\QueryException $e){
                return view('error',['mensaje'=>'El registro no ha sido eliminado'.$e->getCode()]);
            }
        }
        // $usuario=DB::select('select * from usuarios');

        $usuario = Usuario::all();
        $datos = [
            'usuario'=> $usuario
        ];

        return view('acceso', $datos);
    }
}
