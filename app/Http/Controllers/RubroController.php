<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Curso;
use App\Rubro;
class RubroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function storeMultiple(Request $request)
    {
        $curso = Curso::where('id', $request->cursoId)->first();

        $rubros = $request->rubros;
        $rubrosNuevos = array();
        foreach ($rubros as $rubro){
            $rubroNuevo = new Rubro();
            $rubroNuevo->nombre = $rubro['nombre'];
            $rubroNuevo->porcentaje = $rubro['puntaje'];
            $rubroNuevo->nota_actual = 0;
            $rubroNuevo->base = $curso->puntaje;
            $rubroNuevo->status = 1;
            $rubroNuevo->curso_id = $curso->id;
            $rubroNuevo->save();
            array_push($rubrosNuevos, $rubroNuevo);
        }
        return $rubrosNuevos;
    }

    public function store(Request $request)
    {
        $rubro = Rubro::where('id', $request->id)->first();
        $rubro->nombre = $request->nombre;
        $rubro->porcentaje = $request->porcentaje;
        $rubro->nota_actual = $request->nota_actual;
        $rubro->save();

        return $rubro;
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
