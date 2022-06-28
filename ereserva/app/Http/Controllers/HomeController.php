<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Solicitud;

class HomeController extends Controller
{
    public function index()
    {
        $user_id=auth()->id();

        $solicitudes = DB::table('Solicitudes')
        ->join('Eventos', 'Solicitudes.IdEvento','=','Eventos.id')
        ->join('users', 'Eventos.IdUsuario','=','users.id')
        ->select('Solicitudes.id', 'eventos.NombreEvento', 'Solicitudes.FechaEnvio','Solicitudes.FechaSolicitada', 'Solicitudes.HoraSolicitada','Solicitudes.NombreSolicitante','Solicitudes.Email','Solicitudes.NumeroTelefono')
        ->where('solicitudes.Status','=','Pendiente')
        ->where('users.id', '=', $user_id)
        ->get();


        return view('home', compact('solicitudes'));
    }

    public function create()
    {
        return view('home',compact('solicitudes'));
    }
}
