<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $primaryKey = 'DNI'; //por defecto el campo clave es 'id' y entero y autonumerico

    public $incrementing = false; //para indicarle que la clave hno es autoincrementarl

    protected $keyType = 'string'; //indicamos que la cleve no es entera

    public $timestamps = false; //con esto eloquent no maneja automaticamente create_at ni update_at
}
