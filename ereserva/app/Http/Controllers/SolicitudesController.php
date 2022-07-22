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
        ->where('Dia', '>=', now())
        ->groupBy('Dia')
        ->get();

        $array_dias=[];

        for($i=0; $i<=count($diasDisponibles)-1; $i++){
            $array_dias[$i] = $diasDisponibles[$i]->Dia;
        }

        $array_dias = json_encode($array_dias);

        return view('solicitudes.crear',compact(
            'nombreEvento',
            'IdEvento', 
            'array_dias',
            'id_evento',
        ));
    }

    public function store(Request $request, $IdEvento)
    {
    

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
        
        
        DB::table('Solicitudes')
        ->join('Eventos','Solicitudes.IdEvento','=','Eventos.id')
        ->where('Eventos.IdUsuario','=',$user_id)
        ->where('Solicitudes.id','=',$solicitud)
        ->delete();
        

        return redirect()->route('home2');
    }

}
