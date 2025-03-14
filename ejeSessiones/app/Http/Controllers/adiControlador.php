<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adiControlador extends Controller
{
    public function adivinar(Request $req) {
        $accion = $req->get('accion');
        if ($accion == "Empezar partida") {
            // $numeroAle = mt_rand(0, 100);
            // $intentos = 0;
            session()->put('random', $numeroAle);
            return view ('sessiones');
            // session()->put('numintentos', $intentos);

        }else {
            if($accion == 'Me rindo'){
                $msg = 'Te has rendido!!';
                session()->forget('aleatorio');
            }else{
                if(!session()->has('aleatorio')){
                    $inicio = 10;
                    $numRand= rand(1,100);
                    session()->put('intentos',$inicio);
                    session()->put('aleatorio', $numRand);
                }
                $num= $req;
            }
        }
    }

}
