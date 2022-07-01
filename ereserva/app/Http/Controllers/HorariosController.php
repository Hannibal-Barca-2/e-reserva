<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Horario;

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
        $horario->HoraInicio = $request->HoraInicio;
        $horario->HoraFin = $request->HoraFin;
        $horario->Status = 'Disponible';
        $horario->IdEvento = $idEvento;
        $horario->save();
    
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
        ->select('id','Dia','HoraInicio', 'HoraFin', 'Status')
        ->where('IdEvento', '=', $idEvento)
        ->get();

        return view('horarios.crear',compact('horarios', 'idEvento'));
        
    }

    public function edit($id)
    {
        $horario = $id;
        return view('horarios.editar', compact('horario'));
    }

    public function update(Request $request, $id)
    {
        $horarioUpdate = Horario::find($id);
        $horarioUpdate->Dia =$request->Dia;
        $horarioUpdate->HoraInicio =$request->HoraInicio;
        $horarioUpdate->HoraFin = $request->HoraFin;

        $horarioUpdate->save();

        return redirect()->route('eventos.index');
    }

    public function destroy($id)
    {
        DB::table('Horarios')
        ->where('Horarios.id', '=', $id)
        ->delete();

        return redirect()->route('eventos.index');
    }
}
