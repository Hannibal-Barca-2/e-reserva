@extends('layouts.app')

@section('title')
    Solicitudes
@endsection

@section('content')
    <table>
        <thead>
            <tr>
              <th scope="col">Id Solicitud</th>
              <th scope="col">Id Evento</th>
              <th scope="col">Fecha de envio</th>
              <th scope="col">Fecha solicitad</th>
              <th scope="col">Hora solicitada</th>
              <th scope="col">Nombre del solicitante</th>
              <th scope="col">Acciones</th>  
            </tr>
        </thead>
    </table>
@endsection
