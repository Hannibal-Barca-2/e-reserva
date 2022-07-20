@extends('layouts.app')
@section('title')
    Citas
@endsection

@section('content')
    {{-- <div class="row align-items-center">
        <div class="col-md-10 align-self-center" style="text-align-center"> --}}
    <table class="tablas table-striped mt-2 text-center align-items-center" style="overflow-x:auto; margin: 0 auto;">
        <thead>
            <tr>
                <th scope="col">Id Cita</th>
                <th scope="col">Evento</th>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Nombre del solicitante</th>
                <th scope="col">Email</th>
                <th scope="col">Numero telefonico</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($citas as $cita)
                <tr>
                    <td scope="col">{{ $cita->id }}</td>
                    <td scope="col">{{ $cita->NombreEvento }}</td>
                    <td scope="col">{{ $cita->FechaSolicitada }}</td>
                    <td scope="col">{{ $cita->HoraSolicitada }}</td>
                    <td scope="col">{{ $cita->NombreSolicitante }} {{$cita->ApellidoSolicitante}}</td>
                    <td scope="col">{{ $cita->Email }}</td>
                    <td scope="col"><a href="https://wa.me/52{{ $cita->NumeroTelefono }}?text=Hola%20{{ $cita->NombreSolicitante }} {{$cita->ApellidoSolicitante}}%20tu%20solicitud%20para%20{{ $cita->NombreEvento }}%20ha%20sido%20aceptada%20te%20esperamos%20el%20proximo%20{{ $cita->FechaSolicitada }}%20a%20las%20{{ $cita->HoraSolicitada }}%20hrs.">{{ $cita->NumeroTelefono }}
                    </a></td>
                    <td scope="col">
                        <form>
                            <a class="btn btn-danger" href="{{ route('citas.eliminar', $cita->id) }}"><i class="fa-solid fa-trash"></i></a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- </div>
    </div> --}}
@endsection
