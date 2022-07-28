<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Solicitude;

class ReservaController extends Controller
{

    public function index()
    {
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'dia_reserva' => 'required',
            'hora_reserva' => 'required',
            'nombre_solicitante' => 'required|string|min:4|regex:/^[\pL\s\-]+$/u',
            'apellido_solicitante' => 'required|string|min:3|regex:/^[\pL\s\-]+$/u',
            'numero_telefono' => 'required|numeric|digits:10',
            'email' => 'required|email',
        ]);

        $input['FechaSolicitada'] = $request->dia_reserva;
        $input['HoraSolicitada'] = $request->hora_reserva;
        $input['NombreSolicitante'] = $request->nombre_solicitante;
        $input['ApellidoSolicitante'] = $request->apellido_solicitante;
        $input['Email'] = $request->email;
        $input['NumeroTelefono'] = $request->numero_telefono;
        $input['FechaEnvio'] = date("Y-m-d");
        $input['Status'] = 'Pendiente';
        $input['IdEvento'] = $request->id_evento;


        Solicitude::create($input);
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function traerHoras(Request $request)
    {

        $horas = DB::table('horarios')
        ->select('Hora')
        ->where('IdEvento', $request->id_evento)
        ->where('Dia', $request->dia_reserva)
        ->where('Status', 'Disponible')
        ->get();
        
        for($i=0; $i<=count($horas)-1; $i++){
            $arrayhoras[$i]=$horas[$i]->Hora;
        }

        return $arrayhoras;
    }
}
