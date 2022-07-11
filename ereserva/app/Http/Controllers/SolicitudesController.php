<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Solicitud;

class SolicitudesController extends Controller
{
    public function index()
    {
        $eventos = DB::table('eventos')
        ->select('Eventos.id','Eventos.NombreEvento','Eventos.Descripcion')
        ->get();
        return view('user_home', compact('eventos'));
    }

    public function create($IdEvento)
    {   
        $id_evento = $IdEvento;

        $nombreEvento = DB::table('Eventos')
        ->select('NombreEvento')
        ->where('id','=',$IdEvento)
        ->get();

        $diasDisponibles = DB::table('Horarios')
        ->select('Dia')
        ->where('IdEvento','=',$IdEvento)
        ->where('Status','=','Disponible')
        ->groupBy('Dia')
        ->get();

        $horasDisponibles = DB::table('Horarios')
        ->select('Hora')
        ->where('IdEvento','=',$IdEvento)
        ->where('Status','=','Disponible')
        ->get();

        $array_dias=[];
        $array_horas=[];

        for($i=0; $i<=count($horasDisponibles)-1; $i++){
            $array_horas[$i] = $horasDisponibles[$i]->Hora;
        }

        for($i=0; $i<=count($diasDisponibles)-1; $i++){
            $array_dias[$i] = $diasDisponibles[$i]->Dia;
        }

        $array_horas = json_encode($array_horas);
        $array_dias = json_encode($array_dias);

        return view('solicitudes.crear',compact(
            'nombreEvento',
            'IdEvento', 
            'array_horas',
            'array_dias',
            'id_evento',
        ));
    }

    public function store(Request $request, $IdEvento)
    {
        // $this->validate($request[
        //     'FechaSolicitada' => 'required|date',
        //     'HoraSolicitada' => 'required|time',
        //     'NombreSolicitante' => 'reqired',
        //     'ApellidoSolicitante' => 'required',
        //     'NumeroTelefono' => 'required',
        //     'Email' => 'required',
        // ]);

        $input['FechaSolicitada']= $request->dia_reserva;
        $input['HoraSolicitada']= $request->hora_reserva;
        $input['NombreSolicitante']= $request->nombre_solicitante;
        $input['ApellidoSolicitante']= $request->apellido_solicitante;
        $input['Email']= $request->email;
        $input['NumeroTelefono']= $request->numero_telefono;
        $input['FechaEnvio'] = date("Y-m-d");
        $input['Status']='Pendiente';
        $input['IdEvento']= $request->idevento;
        $input['FechaEnvio']= date();
        
        Solicitud::create($input); 


        
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        
    }

    public function update($solicitud)
    {   
        $user_id=auth()->id();
        DB::table('Solicitudes')
        ->join('Eventos','Solicitudes.IdEvento','=','Eventos.id')
        ->where('Eventos.IdUsuario','=',$user_id)
        ->where('Solicitudes.id','=',$solicitud)
        ->update(['Status'=>'Aceptada']);

        DB::table('Horarios')
        ->join('Eventos', 'Horarios.IdEvento','=','Eventos.id')
        ->join('Solicitudes', 'Eventos.id', '=', 'Solicitudes.IdEvento')
        ->where('Solicitudes.id','=', $solicitud)
        ->where('Solicitudes.Status', '=', 'Aceptada')
        ->whereColumn('Solicitudes.FechaSolicitada','Horarios.Dia')
        ->whereColumn('Solicitudes.HoraSolicitada','Horarios.Hora')
        ->update(['Horarios.Status'=>'Ocupado']);
        
        return redirect()->route('home2');
    }

    public function destroy($solicitud)
    {
        $user_id = auth()->id();
        
        DB::table('Horarios')
        ->join('Eventos', 'Horarios.IdEvento','=','Eventos.id')
        ->join('Solicitudes', 'Eventos.id', '=', 'Solicitudes.IdEvento')
        ->where('Solicitudes.id','=', $solicitud)
        ->whereColumn('Solicitudes.FechaSolicitada','Horarios.Dia')
        ->whereColumn('Solicitudes.HoraSolicitada','Horarios.Hora')
        ->update(['Horarios.Status'=>'Disponible']);
        
        DB::table('Solicitudes')
        ->join('Eventos','Solicitudes.IdEvento','=','Eventos.id')
        ->where('Eventos.IdUsuario','=',$user_id)
        ->where('Solicitudes.id','=',$solicitud)
        ->delete();
        

        return redirect()->route('home2');
    }
}
