<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ejercicio extends Model
{
    protected $table = 'ejercicios';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombreEjercicio',
        'descripcionEjercicio',
        'repeticiones',
        'series',
        'activacionMuscular',
        'imagen',
        'video',
        'activado',
        'created_at',
        'updated_at'
    ];
}
