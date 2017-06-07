<?php

use Illuminate\Database\Seeder;
use App\Model\Alumnos;
use App\Model\Calificaciones;
use App\Model\Materias;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = new Alumnos();
        $a->nombre = "John";
        $a->ap_paterno = "Dow";
        $a->ap_materno = "Down";
        $a->activo = 1;
        $a->save();

        $materias = ["matematicas", "programacion I", "ingenieria de sofware"];
        foreach ($materias as $mName) {
          $m = new Materias();
          $m->nombre = $mName;
          $m->activo = 1;
          $m->save();
        }




    }
}
