@extends('user_layouts.app')

@section('title')
    ¡Bienvenido a e-reserva!
@endsection

@section('content')
<div class="container">
    <table class="tablas table-striped mt-2 text-center align-items-center" style="overflow-x:auto; margin: 0 auto;">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Reservar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eventos as $evento)
                <tr>
                    <td scope="col">{{ $evento->NombreEvento }}</td>
                    <td scope="col">{{ $evento->Descripcion }}</td>
                    <td scope="col">
                        <a class="btn btn-primary" href="{{route('solicitudes.reservar', $evento->id)}}">Solicitar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
