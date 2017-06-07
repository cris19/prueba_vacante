<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Alumnos;
use App\Model\Calificaciones;
use App\Model\Materias;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "hola";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
          $a = $request->get('id_t_usuarios');
          $m = $request->get('id_t_materias');
          $c = $request->get('calificacion');

          $my = new Calificaciones();
          $my->id_t_materias = $m;
          $my->id_t_usuarios = $a;
          $my->calificacion = $c;
          $my->fecha_registro = date('Y-m-d');
          $my->save();
          return ["success"=>"ok", "msg"=>"calificacion registrada"];

        } catch (Exception $e) {
          return ["success"=>"not", "msg"=>"error"];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $calif = Calificaciones::where('id_t_usuarios',$id)->get();
        $myCalif = [];
        $myProm = [];
        foreach ($calif as $c) {
          $cTemp = [];
          $cTemp['id_t_usuario'] = $c->alumno->id_t_usuarios;
          $cTemp['nombre'] = $c->alumno->nombre;
          $cTemp['apellido'] = $c->alumno->apellido;
          $cTemp['materia'] = $c->materia->nombre;
          $cTemp['calificacion'] = $c->calificacion;
          array_push($myProm,$c->calificacion);
          $cTemp['fecha_registro'] = $c->fecha_registro;
          array_push($myCalif,$cTemp);
        }

        return [$myCalif,['promedio'=>array_sum($myProm)/count($myProm)]];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      try {
        $c = Calificaciones::find($id);
        $c->calificacion = $request->get('calificacion');
        return ["success"=>"ok", "msg"=>"calificacion actualizada"];
      } catch (Exception $e) {
        return ["success"=>"not", "msg"=>"error"];
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      try {
        $c = Calificaciones::find($id);
        $c->delete();
        return ["success"=>"ok", "msg"=>"calificacion eliminada"];
      } catch (Exception $e) {
        return ["success"=>"not", "msg"=>"error"];
      }
    }
}
