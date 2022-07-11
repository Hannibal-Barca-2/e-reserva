<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Solicitude;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        // $this->validate($request[
        //     'FechaSolicitada' => 'required|date',
        //     'HoraSolicitada' => 'required|time',
        //     'NombreSolicitante' => 'reqired',
        //     'ApellidoSolicitante' => 'required',
        //     'NumeroTelefono' => 'required',
        //     'Email' => 'required',
        // ]);

        $input['FechaSolicitada'] = $request->dia_reserva;
        $input['HoraSolicitada'] = $request->hora_reserva;
        $input['NombreSolicitante'] = $request->nombre_solicitante;
        $input['ApellidoSolicitante'] = $request->apellido_solicitante;
        $input['Email'] = $request->email;
        $input['NumeroTelefono'] = $request->numero_telefono;
        $input['FechaEnvio'] = date("Y-m-d");
        $input['Status'] = 'Pendiente';
        $input['IdEvento'] = $request->idevento;


        Solicitude::create($input);
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
