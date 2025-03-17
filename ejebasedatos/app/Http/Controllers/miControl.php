<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Persona;
use App\Models\Coche;
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

    public function validar(Request $req){
        if ($req->get('vertodos')){
            $pers = Persona::all();
            $datos = [
                'pers' => $pers
            ];
            return view('listado', $datos);
        }
        if ($req->get('buscar')){
            $dn = $req->get('dni');
            $pers = Persona::find($dn);

            if (!$pers){
                return view('error', ['mensaje' => 'Persona no encontrada']);
            } else {
                $datos = [
                    'pers' => $pers,
                    'mensaje' => 'persona encontrada'
                ];
                return view('exito', $datos);
            }

        }
        if ($req->get('registrar')){
            $dni = $req->get('dni');
            $nom = $req->get('nombre');
            $tfno = $req->get('tfno');
            $edad = $req->get('edad');


            $pe = new Persona();
            $pe->DNI = $dni;
            $pe->Nombre = $nom;
            $pe->Tfno = $tfno;
            $pe->edad = $edad;

            try {
                $pe->save();
                return view('exito', ['mensaje' => 'Persona registrada con exito']);
            }
            catch (\Illuminate\Database\QueryException $ex){
                return view('error', ['mensaje' => 'se ha encontrado error: ' . $ex->getCode()]); // Cambiado getMessage()
            }

        }
        if ($req->get('borrar')){
            $dni = $req->get('dni');

            $pe = Persona::find($dni);

            if($pe){
                // se puede presentar un error a la hora de borrar un registro y es si este es clave foranea de otro registro
                // en este caso se  ara de la siguiente manera
                try {
                    $pe->delete();
                    return view('exito', ['mensaje' => 'Registro borrado']);
                }
                catch (\Illuminate\Database\QueryException $ex){
                    return view('error', ['mensaje' => 'se ha encontrao error: ' . $ex->getCode()]); // Cambiado getMessage()
                }
            } else {
                return view('error', ['mensaje' => 'Registro no encontrado']);
            }


        }
        if ($req->get('modificar')){
            $dni = $req->get('dni');
            $pe = Persona::find($dni);

            if($pe){

                $pe->Nombre = $req->get('nombre');
                // $pe->Tfno = $req->get('tfno');
                // $pe->edad = $req->get('edad');
                try {
                    $pe->save();
                    return view('exito', ['mensaje' => 'Registro modificado']);
                }
                catch (\Illuminate\Database\QueryException $ex){
                    return view('error', ['mensaje' => 'se ha encontrao error: ' . $ex->getCode()]); // Cambiado getMessage()
                }
            }else {
                return view('error', ['mensaje' => 'Registro no encontrado']);
            }

        }
    }

    public function validarCoches(Request $req){
        if ($req->get('vertodos')){
            $coches = Coche::all();
            $datos = [
                'coches' => $coches
            ];
            return view('listado', $datos);
        }
        if($req->get('buscar')){
            $mat = $req->get('matricula');
            $coch = Coche::find($mat);

            if($coch){
                $datos = [
                    'coch' => $coch,
                    'mensaje' => 'Coche encontrado'
                ];
                return view('exito', $datos);
            }else {
                return view('error', ['mensaje' => 'Persona no encontrada']);
            }
        }
        if($req->get('registrar')){
            $mat = $req->get('matricula');
            $mar = $req->get('marca');
            $mod = $req->get('modelo');



            $co = new Coche();
            $co->Matricula = $mat;
            $co->Marca = $mar;
            $co->Modelo = $mod;

            try {
                $co->save();
                return view('exito', ['mensaje' => 'Coche registrado con exito']);
            }
            catch (\Illuminate\Database\QueryException $ex){
                return view('error', ['mensaje' => 'se ha encontrado error: ' . $ex->getCode()]); // Cambiado getMessage()
            }
        }
        if ($req->get('borrar')){
            $mat = $req->get('matricula');

            $co = Coche::find($mat);

            if($co){
                // se puede presentar un error a la hora de borrar un registro y es si este es clave foranea de otro registro
                // en este caso se  ara de la siguiente manera
                try {
                    $co->delete();
                    return view('exito', ['mensaje' => 'Registro borrado']);
                }
                catch (\Illuminate\Database\QueryException $ex){
                    return view('error', ['mensaje' => 'se ha encontrao error: ' . $ex->getCode()]); // Cambiado getMessage()
                }
            } else {
                return view('error', ['mensaje' => 'Registro no encontrado']);
            }


        }
        if ($req->get('modificar')){
            $mat = $req->get('matricula');
            $co = Coche::find($mat);

            if($co){

                $co->Modelo = $req->get('modelo');
                $co->Marca = $req->get('marca');
                // $co->edad = $req->get('edad');
                try {
                    $co->save();
                    return view('exito', ['mensaje' => 'Registro modificado']);
                }
                catch (\Illuminate\Database\QueryException $ex){
                    return view('error', ['mensaje' => 'se ha encontrao error: ' . $ex->getCode()]); // Cambiado getMessage()
                }
            }else {
                return view('error', ['mensaje' => 'Registro no encontrado']);
            }

        }
    }
}
