<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class miControl extends Controller
{
    public function listar_a(Request $req){
        // LIBRERIA DB
        // A) SELECT SENCILLA SIN PARAMETROS SIN NOMBRE Y SIN ORDEN
        $personas = DB::select('select * from personas where EDAD >= ? AND DNI = ?', [30, '3C']);
        $datos = [
            'pers' => $personas
        ];

        return view('listado', $datos);
    }

    public function listar_b(Request $req){
        // LIBRERIA DB
        // A) consulta sencilla con parametro con nombre y filtrando
        $personas = DB::select('select * from personas where DNI = :nombre1', ['nombre1' => '4D' ]);
        $datos = [
            'pers' => $personas
        ];

        return view('listado', $datos);
    }
    public function listar_c(Request $req){
        // LIBRERIA DB
        // A) consulta DE VARIAS TABLAS
        $consulta = 'select * from personas, propiedades, coches ' .
                    'where propiedades.DNI = personas.DNI ' .
                    'AND propiedades.Matricula = coches.Matricula ' .
                    'AND personas.DNI = ?';

        $personas = DB::select($consulta, ['1A']);
        $datos = [
            'pers' => $personas
        ];

        return view('listado', $datos);
    }

    public function insertar(Request $req){
        //INSERTAR
        try {
            DB::insert('insert into personas (DNI, Nombre, Tfno, edad) values (?, ?, ?, ?)', ['19533J', 'otrotipo', '1234', 36]);
            return view('exito', ['mensaje' => 'Registro insertado correctamente']);
        }
        catch (\Illuminate\Database\QueryException $e){
            return view('error', ['mensaje' => $e->getMessage()]); // Cambiado getMessage()
        }
        catch (\ErroException $e){
            return view('error', ['mensaje'=>'La operacion no se ha podido realizar']);
        }
    }
    public function modificar(){
        //MODIFICAR
        try {
            $afectadas = DB::update("update personas set Tfno = '100' where DNI = ?", ['3C']);
            return view('exito', ['mensaje' => 'Se han modifcado '. $afectadas. ' personas correctamente']);
        }
        catch (\Illuminate\Database\QueryException $e){
            return view('error', ['mensaje' => $e->getMessage()]); // Cambiado getMessage()
        }
        catch (\ErroException $e){
            return view('error', ['mensaje'=>'La operacion no se ha podido realizar']);
        }
    }

    public function eliminar(){
        //ELIMINAR
        try {
            $borradas = DB::delete("delete from personas where DNI = ?", ['19533J']);
            return view('exito', ['mensaje' => 'Se han eliminado '. $borradas . ' personas correctamente']);
        }
        catch (\Illuminate\Database\QueryException $e){
            return view('error', ['mensaje' => $e->getMessage()]); // Cambiado getMessage()
        }
        catch (\ErroException $e){
            return view('error', ['mensaje'=>'La operacion no se ha podido realizar']);
        }
    }
}
