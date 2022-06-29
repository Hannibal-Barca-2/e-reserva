<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Evento;

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
    public function create()
    {
        return view('eventos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $eventoNuevo = new Evento();
        $eventoNuevo->NombreEvento = $request->NombreEvento;
        $eventoNuevo->Descripcion = $request->Descripcion;
        $eventoNuevo->IdUsuario = auth()->id();
        $eventoNuevo->save();

        return redirect()->route('eventos.horarios');
    }

    public function horarios()
    {
        return view('horarios.crear');        
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
