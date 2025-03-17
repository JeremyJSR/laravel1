<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $primaryKey = 'email'; //por defecto el campo clave es 'id' y entero y autonumerico

    public $incrementing = false; //para indicarle que la clave hno es autoincrementarl

    protected $keyType = 'string'; //indicamos que la cleve no es entera

    public $timestamps = false; //con esto eloquent no maneja automaticamente create_at ni update_at

}
