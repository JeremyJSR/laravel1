<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class formcontrolador extends Controller
{
    public function validarEjercicio2fin(Request $req){
        $eda = $req->get('numero');
        if ($eda >= 18){
            $datos= [
            'nombre'=> $nom = $req->get('nombre'),
            'edad' => $eda,
            'bebida'=> $beb = $req->get('bebidas'),
            'aficiones'=> $afi = $req->get('aficiones'),
            'comentarios'=> $com = $req->get('comentarios'),
            ];
            return view ('mayor', $datos);
        }else {
            $datos['mensaje'] = 'vuelve cuando seas mayor';
            return view('menor', $datos);
        }
    }

    public function calcular(Request $req){
        $num1 = $req->get('numero1');
        $num2 = $req->get('numero2');
        $operacion = $req->get('aceptar');

        if($num1 >= 0 || $num2 >= 0){
            $datos = [ 'mensaje' => 'Los numeros no pueden ser negativos'];
            return view('resultado', $datos);
        }elseif ($operacion == 'sumar') {
            $resultado = $num1 + $num2;
        } elseif ($operacion == 'restar') {
            $resultado = $num1 - $num2;
        } elseif ($operacion == 'multiplicar') {
            $resultado = $num1 * $num2;
        } elseif ($operacion == 'dividir') {
            if ($num2 == 0) {
                $datos = ['mensaje' => 'No se puede dividir entre cero'];
                return view('resultado', $datos);
            }
            $resultado = $num1 / $num2;
        } else {
            $datos = ['mensaje' => 'Operación no válida'];
            return view('resultado', $datos);

    }


}
}
