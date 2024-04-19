<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rutina extends Model
{
    protected $table = 'ejercicios_rutinas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombreRutina',
        'fechaInicio',
        'fechaFin',
        'idUsuario',
        'idUsuarioCreador',
        'created_at',
        'updated_at',
    ];
}
