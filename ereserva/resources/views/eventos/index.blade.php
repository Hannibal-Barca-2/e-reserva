@extends('layouts.app')
@section('title')
    Eventos
@endsection

@section('content')
    {{-- <div class="row align-items-center">
        <div class="col-md-10" style="text-align-center"> --}}
            <table class="tablas table-striped mt-2 text-center align-items-center" style="overflow-x:auto; margin: 0 auto;">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Dias que se ofrece</th>
                        <th scope="col">Hora Inicio</th>
                        <th scope="col">Hora Fin</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($eventos as $evento)
                    <tr>
                        <td scope="col">{{ $evento->NombreEvento }}</td>
                        <td scope="col">{{ $evento->Dia }}</td>
                        <td scope="col">{{ $evento->HoraInicio }}</td>
                        <td scope="col">{{ $evento->HoraFin }}</td>
                        <td scope="col">
                            <a class="btn btn-danger" href="{{ route('eventos.eliminar', $evento->id) }}"><i class="fa-solid fa-ban"></i></a>
                            <a class="btn btn-primary" href=""><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a class="button button1" href="{{route('eventos.crear')}}">Crear Evento</a>
        {{-- </div>
    </div> --}}
    
    
@endsection
