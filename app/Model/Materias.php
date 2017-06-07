<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Materias extends Model
{
    protected $table = 't_materias';
    protected $primaryKey = 'id_t_materias';
    public $timestamps = false;
}
