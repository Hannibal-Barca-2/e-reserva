<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Validator;
use App\Models\Evento;
use App\Models\Horario;
use App\Models\Solicitud;
use Alert;

class EventosController extends Controller
{
    public function index()
    {
        $user_id=auth()->id();
        $fechaactual=now();

        $eventos = DB::table('eventos')
        ->select('Eventos.id','Eventos.NombreEvento','Eventos.Descripcion')
        ->where('Eventos.IdUsuario','=',$user_id)
        ->get();

        DB::table('Eventos')
        ->join('Horarios','Eventos.id','=','Horarios.IdEvento')
        ->where('Horarios.Dia', '<', $fechaactual)
        ->delete();

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
        $horarioNuevo->Hora = $request->Hora;
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

        return view('eventos.editar', compact('nombreEvento'));
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

        $cuenta=DB::table('Solicitudes')
        ->select(DB::raw('count(solicitudes.id) as solicitudes_cuenta'))
        ->where('solicitudes.idEvento','=',$evento)
        ->get();

        if($cuenta[0]->solicitudes_cuenta!=0){
            
            Alert::error('Error', 'No se puede eliminar este evento, todavia hay solicitudes para este evento');
            return redirect()->route('eventos.index');

        }else{
            DB::table('Horarios')
            ->where('Horarios.IdEvento','=',$evento)
            ->delete();
            DB::table('Eventos')
            ->where('Eventos.IdUsuario','=',$user_id)
            ->where('Eventos.id','=',$evento)
            ->delete();
            
            Alert::success('Se ha eliminado un evento');
            return redirect()->route('eventos.index');
        }

    }
}
