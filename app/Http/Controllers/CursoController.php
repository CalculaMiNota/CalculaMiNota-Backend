<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App;
use App\Curso;
use App\User;
use App\Rubro;
use Illuminate\Support\Facades\Auth;
use DB;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->user();

        if($user)
        {
            $usuario = User::where('email', $user->email)->first();
            $cursos = Curso::where('user_id', $usuario->id)->where('status', '=', 0)->with('rubros')->get();
            return ($cursos);
        }
        return [];

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
        if($request->id  != null)
        {
            $curso = Curso::where('id', $request->id)->first();

            $curso->nombre = $request->nombreCurso;
            $curso->puntaje = $request->puntajeTotal;
            $curso->minimo = $request->minimo;

            $curso->save();

            return($curso);
        }
        else
        {
            $curso = new Curso();
            $usuario = User::where('email', $request->email)->first();

            $curso->nombre = $request->nombreCurso;
            $curso->puntaje = $request->puntajeTotal;
            $curso->minimo = $request->minimo;
            $curso->user_id = $usuario->id;

            $curso->save();

            return($curso);
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
        //
    }

    private function user(){
        return Auth::user();
    }

    public function dashboardData(){
        $user = $this->user();

        if($user)
        {
            $data = [];
            $data = DB::select("SELECT c.id, c.nombre, c.puntaje, c.minimo, ROUND(sum((ru.porcentaje / c.puntaje) * ru.nota_actual), 0) as nota_total
                        FROM
                            cursos AS c
                                JOIN
                            rubros AS ru ON (c.id = ru.curso_id)
                        WHERE c.status = 0 and ru.status = 1 and c.user_id = $user->id
                        GROUP BY c.nombre, c.puntaje, c.minimo");
            return $data;
        }
        return [];
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
    public function remove(Request $request){
        $id = $request->id;
        $curso = Curso::where('id', $id)->first();
        $curso->status = -1;
        $curso->save();
        return $curso;
    }
}
