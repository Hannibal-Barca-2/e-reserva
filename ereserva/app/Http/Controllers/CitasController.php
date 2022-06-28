<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cita;

class CitasController extends Controller
{
    public function index()
    {
        $user_id = auth()->id();
        $citas = DB::table('Solicitudes')
        ->join('Eventos', 'Solicitudes.IdEvento', '=', 'Eventos.id')
        ->select('solicitudes.id', 'eventos.NombreEvento', 'solicitudes.FechaSolicitada', 'solicitudes.HoraSolicitada', 'solicitudes.NombreSolicitante','solicitudes.Email','solicitudes.NumeroTelefono')
        ->where('Solicitudes.Status','=','Aceptada')
        ->where('Eventos.IdUsuario','=',$user_id)
        ->get();


     return view('citas.index', compact('citas'));
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
        //
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
    public function destroy($cita)
    {
        $user_id = auth()->id();
        DB::table('Solicitudes')
        ->join('Eventos','Solicitudes.IdEvento','=','Eventos.id')
        ->where('Eventos.IdUsuario','=',$user_id)
        ->where('Solicitudes.id','=',$cita)
        ->where('Solicitudes.Status','=','Aceptada')
        ->delete();

        return redirect()->route('citas');
    }
}
