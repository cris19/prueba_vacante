<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    protected $table = 't_alumnos';
    protected $primaryKey = 'id_t_usuarios';
    public $timestamps = false;

    public function calificaciones()
    {
      return $this->hasMany(Calificaciones::class,'id_t_usuarios');
    }
    
}
