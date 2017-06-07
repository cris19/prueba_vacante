<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTCalificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_calificaciones', function (Blueprint $table) {
            $table->increments('id_t_calificaciones');
            $table->integer('id_t_materias')->unsigned();
            $table->integer('id_t_usuarios')->unsigned();
            $table->foreign('id_t_materias')->references('id_t_materias')->on('t_materias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_t_usuarios')->references('id_t_usuarios')->on('t_alumnos')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('calificacion', 10, 2);
            $table->date('fecha_registro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_calificaciones');
    }
}
