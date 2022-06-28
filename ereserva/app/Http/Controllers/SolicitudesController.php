<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Solicitud;

class SolicitudesController extends Controller
{
    public function index()
    {

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
    public function update($solicitud)
    {   
        $user_id=auth()->id();
        DB::table('Solicitudes')
        ->join('Eventos','Solicitudes.IdEvento','=','Eventos.id')
        ->where('Eventos.IdUsuario','=',$user_id)
        ->where('Solicitudes.id','=',$solicitud)
        ->update(['Status'=>'Aceptada']);

        return redirect()->route('home2');
    }

    public function destroy($solicitud)
    {
        $user_id = auth()->id();
        DB::table('Solicitudes')
        ->join('Eventos','Solicitudes.IdEvento','=','Eventos.id')
        ->where('Eventos.IdUsuario','=',$user_id)
        ->where('Solicitudes.id','=',$solicitud)
        ->delete();

        return redirect()->route('home2');
    }
}
