<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;

class loginControlador extends Controller
{
    public function accion(Request $req){
        $acceso = $req->get('acceder');
        $registrar = $req->get('registrar');

        $usu = $req->get('usuario');
        $pass = $req->get('pass');

        if($acceso){
            $consulta = 'select email, pass from usuarios where usuarios.email = ? AND usuarios.pass = ?';

            if($usuario = DB::select($consulta, [$usu, $pass])){
                $usuario = DB::select('select * from usuarios');
                session()->put('usuario', $usuario);
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
            try {
                DB::insert('insert into usuarios (email, nombre, edad, pass) values (?, ?, ?, ?)',
                [$req->get('email'), $req->get('nombre'), $req->get('edad'), $req->get('pass')]);
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
