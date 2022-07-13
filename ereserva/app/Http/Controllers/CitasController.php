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

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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

    public function destroy($cita)
    {
        $user_id = auth()->id();

        DB::table('Horarios')
        ->join('Eventos','Horarios.IdEvento','=','Eventos.id')
        ->join('Solicitudes','Eventos.id','=','Solicitudes.IdEvento')
        ->where('Horarios.Status', '=', 'Ocupado')
        ->where('Eventos.IdUsuario','=',$user_id)
        ->where('Solicitudes.id','=',$cita)
        ->update(['Horarios.Status'=>'Disponible']);

        DB::table('Solicitudes')
        ->join('Eventos','Solicitudes.IdEvento','=','Eventos.id')
        ->where('Eventos.IdUsuario','=',$user_id)
        ->where('Solicitudes.id','=',$cita)
        ->where('Solicitudes.Status','=','Aceptada')
        ->delete();


        return redirect()->route('citas');
    }
}
