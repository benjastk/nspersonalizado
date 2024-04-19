<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EjercicioRutina extends Model
{
    protected $table = 'ejercicios_rutinas';
    protected $primaryKey = 'idEjercicioRutina';
    protected $fillable = [
        'idEjercicio',
        'idRutina',
        'seriesFinales',
        'repeticionesFinales',
        'observaciones',
        'created_at',
        'updated_at'
    ];
}
