<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class vectorControlador extends Controller
{
    public function addNumero(Request $req){
        //aqui recogeremos el valor que hata introducido el usuario
        //y se añade al final del vector que hay en la session
        $num = $req->get('numero');
        if(session()->has('vector')){
            $vec=session()->get('vector');
        } else {
            $vec = [];

        }
        //a partir de este momento la variable "vec" tiene el vecor de la sesion
        //o se ha creado uno nuevo vacio (si no estaba en la sesion)
        //le añado el numero al final del vector
        $vec[]=$num;

        //tengo que actualizar el vector en la sesion
        session()->put('vector', $vec);
        return view('lista');
    }

    public function modNumero(Request $req){
        $mod = $req->get('modificacion');
        $num = $req->get('vector');
        $pos = $req->get('posicion');
        $vec=session()->get('vector');

        if($mod == 'Editar'){
            $vec[$pos] = $num;
        }elseif($mod == 'Eliminar'){
            unset($vec[$pos]);
        }
        session()->put('vector', $vec);
        return view('lista');
    }
}
