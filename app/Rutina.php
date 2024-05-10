<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rutina extends Model
{
    protected $table = 'rutinas_alumnos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombreRutina',
        'fechaInicio',
        'fechaFin',
        'idUsuario',
        'idUsuarioCreador',
        'activado',
        'created_at',
        'updated_at',
    ];
}
