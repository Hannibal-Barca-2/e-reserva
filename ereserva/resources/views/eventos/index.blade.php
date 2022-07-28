@extends('layouts.app')
@section('title')
    Eventos
@endsection

@section('content')
    @include('sweetalert::alert')
    {{-- <div class="row align-items-center">
        <div class="col-md-10" style="text-align-center"> --}}
    <div class="container">
        <table class="tablas table-striped mt-2 mb-2 text-center align-items-center" style="overflow-x:auto; margin: 0 auto;">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($eventos as $evento)
                    <tr>
                        <td scope="col">{{ $evento->NombreEvento }}</td>
                        <td scope="col">{{ $evento->Descripcion }}</td>
                        <td scope="col">
                            <a class="btn btn-danger" href="{{ route('eventos.eliminar', $evento->id) }}"><i
                                    class="fa-solid fa-trash"></i></a>
                            <a class="btn btn-primary" href="{{ route('eventos.edit', $evento->id) }}"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                            <a class="btn btn-success" href="{{ route('horarios.show', $evento->id) }}"><i
                                    class="fa-solid fa-clock"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a class="button button1" href="{{ route('eventos.create') }}">Crear Evento</a>
    </div>
    {{-- </div>
    </div> --}}
@endsection
