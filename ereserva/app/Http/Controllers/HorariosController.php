<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Horario;
use Alert;

class HorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function create()
    {
        // $user_id = auth()->id();

        // $horarios = DB::table('Horarios')
        // ->select('id','Dia','HoraInicio', 'HoraFin', 'Status')
        // ->where('IdEvento', '=', $idEvento)
        // ->get();

        // return view('horarios.crear',compact('horarios', 'idEvento'));
    }
    
    public function store(Request $request, $idEvento)
    {
        $horario = new Horario();
        $horario->Dia = $request->Dia;
        $horario->Hora = $request->Hora;
        $horario->Status = 'Disponible';
        $horario->IdEvento = $idEvento;
        $horario->save();
    
        Alert::success('Se ha guardado el horario correctamente');

        return redirect()->route('eventos.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idEvento)
    {
        $user_id = auth()->id();

        $horarios = DB::table('Horarios')
        ->select('id','Dia','Hora', 'Status')
        ->where('IdEvento', '=', $idEvento)
        ->get();

        return view('horarios.crear',compact('horarios', 'idEvento'));
        
    }

    public function edit($id)
    {
        $horario = DB::table('Horarios')
        ->select( 'Horarios.id','Horarios.Dia', 'Horarios.Hora')
        ->where('Horarios.id', '=', $id)
        ->get();

        return view('horarios.editar', compact('horario'));
    }

    public function update(Request $request, $id)
    {
        $horarioUpdate = Horario::find($id);
        $horarioUpdate->Dia =$request->Dia;
        $horarioUpdate->Hora =$request->Hora;
        $horarioUpdate->save();

        Alert::success('Se ha modificado el horario correctamente');

        return redirect()->route('eventos.index');
    }

    public function destroy($id)
    {
        DB::table('Horarios')
        ->where('Horarios.id', '=', $id)
        ->delete();
        Alert::success('Se ha eliminado el horario correctamente');
        return redirect()->route('eventos.index');
    }
}
