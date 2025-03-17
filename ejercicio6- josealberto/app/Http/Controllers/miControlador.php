<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class miControlador extends Controller
{
    public function comprobarUsuario(Request $req){
        if($req->has('registrar')){
            return view('nuevoregistro');
        }else{
            $email=$req->get('email');
            $pass=$req->get('pass');
            $usuario=DB::select('select nombre,email from usuarios where email=:em and pass=:pa',
            ['pa'=>$pass, 'em'=>$email]);

            if($usuario!=null){
                session()->put('usuario',$usuario);
                $users=DB::select('select * from usuarios');
                $datos=[
                    'users'=>$users
                ];
                return view('resultado',$datos);
            }else {
                $datos=[
                    'mensaje'=>'Datos erróneos, inténtalo de nuevo o regístrate'
                ];
                return view('welcome',$datos);
            }
        }
    }

    public function updateDeleteUsuario(Request $req){
        $email=$req->get('email');

        if($req->has('editar')){
            $nombre=$req->get('nombre');
            $edad=$req->get('edad');
            try{
               DB::update('update usuarios set nombre= ?, edad=? where email=?',[$nombre, $edad, $email]);
            }catch(\Illuminate\Database\QueryException $e){
                return view('error',['mensaje'=>'El registro no ha sido insertado'.$e->getCode()]);
            }
        } else {
            try{
                DB::delete('delete from usuarios where email=?',[$email]);
            }catch(\Illuminate\Database\QueryException $e){
                return view('error',['mensaje'=>'El registro no ha sido eliminado'.$e->getCode()]);
            }
        }

        $users=DB::select('select * from usuarios');
        $datos=[
            'users'=>$users
        ];

        return view('resultado',$datos);
    }

    public function addUsuario(Request $req){
        if($req->has('cancelar')){
            return view('welcome');
        } else {
            try{
                //Recuperamos los datos del formulario
                $em = $req->get('email');
                $no = $req->get('nombre');
                $ed = $req->get('edad');
                $pw = $req->get('pass');

                DB::insert('insert into usuarios (email, nombre, edad, pass) values(?,?,?,?)',
                [$em,$no,$ed,$pw]);
                return view('nuevoregistro',['mensaje'=>'Registro Insertado con exito.']);
            }catch(\Illuminate\Database\QueryException $exc){

                return view('nuevoregistro',['mensaje'=>'El registro no fue insertado: '.$exc->getCode()]);
            }
        }
    }
}
