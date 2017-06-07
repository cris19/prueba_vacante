<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Calificaciones extends Model
{
    protected $table = 't_calificaciones';
    protected $primaryKey = 'id_t_calificaciones';
    public $timestamps = false;
    public function alumno()
    {
      return $this->belongsTo(Alumnos::class,'id_t_usuarios');
    }
    public function materia()
    {
      return $this->belongsTo(Materias::class,'id_t_materias');
    }
}
