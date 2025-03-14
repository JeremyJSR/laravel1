<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class calControlador extends Controller
{
    public function calcular(Request $req){
        $num1 = $req->get('numero1');
        $num2 = $req->get('numero2');
        $operacion = $req->get('aceptar');

        $resultado = null;

        // Condicionales para las operaciones
        if ($operacion == 'sumar') {
            $resultado = $num1 + $num2;
        } elseif ($operacion == 'restar') {
            $resultado = $num1 - $num2;
        } elseif ($operacion == 'multiplicar') {
            $resultado = $num1 * $num2;
        } elseif ($operacion == 'dividir') {
            if ($num2 == 0) {
                $datos = [
                    'numero1' => $num1,
                    'numero2' => $num2,
                    'operacion' => $operacion,
                    'resultado' => 'No se puede dividir entre cero' ];
                return view('resultado', $datos);
            }
            $resultado = $num1 / $num2;
        } else {
            $datos = [ 'mensaje' => 'Operación no válida' ];
            return view('resultado', $datos);
        }

        session()-> put('loquesea', $resultado);

        $datos = [
            'numero1' => $num1,
            'numero2' => $num2,
            'operacion' => $operacion,
            'resultado' => $resultado
        ];

        return view('resultado', $datos);
    }

}
