<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Validator;
use App\Models\Evento;
use App\Models\Horario;

class EventosController extends Controller
{
    public function index()
    {
        $user_id=auth()->id();
        $eventos = DB::table('eventos')
        ->join('Horarios', 'Horarios.IdEvento','=','Eventos.id')
        ->select('Eventos.id','Eventos.NombreEvento','Horarios.Dia','Horarios.HoraInicio','Horarios.HoraFin')
        ->where('Eventos.IdUsuario','=',$user_id)
        ->get();

        return view('eventos.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $eventoNuevo = new Evento();
        $eventoNuevo->NombreEvento = $request->NombreEvento;
        $eventoNuevo->Descripcion = $request->Descripcion;
        $eventoNuevo->IdUsuario = auth()->id();
        $eventoNuevo->save();

        $horarioNuevo = new Horario;
        $horarioNuevo->Dia = $request->Dia;
        $horarioNuevo->HoraInicio = $request->HoraInicio;
        $horarioNuevo->HoraFin = $request->HoraFin;
        $horarioNuevo->Status = 'Disponible';
        $horarioNuevo->IdEvento = $eventoNuevo->id;
        $horarioNuevo->save();

        return redirect()->route('eventos.index');
    }
    public function create()
    {
        return view('eventos.crear');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $evento = $id;
        $user_id = auth()->id();
        $nombreEvento = DB::table('Eventos')
        ->select('Eventos.NombreEvento', 'Eventos.id', 'Eventos.Descripcion')
        ->where('Eventos.id', '=', $evento)
        ->where('Eventos.IdUsuario', '=', $user_id)
        ->get();

        $horarios = DB::table('Horarios')
        ->select('id','Dia','HoraInicio', 'HoraFin', 'Status')
        ->where('IdEvento', '=', $evento)
        ->get();

        return view('eventos.editar', compact('nombreEvento', 'horarios', 'evento'));
    }

    public function update(Request $request, $id)
    {
        $eventoUpdate = Evento::find($id);
        $eventoUpdate->NombreEvento = $request->NombreEvento;
        $eventoUpdate->Descripcion = $request->Descripcion;

        $eventoUpdate->save();

        return redirect()->route('eventos.index');
    }

    public function destroy($evento)
    {
        $user_id = auth()->id();
        DB::table('Horarios')
        ->where('Horarios.IdEvento','=',$evento)
        ->delete();
        DB::table('Eventos')
        ->where('Eventos.IdUsuario','=',$user_id)
        ->where('Eventos.id','=',$evento)
        ->delete();

        return redirect()->route('eventos.index');
    }
}
