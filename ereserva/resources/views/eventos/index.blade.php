@extends('layouts.app')
@section('title')
    Eventos
@endsection

@section('content')
    <div class="row align-items-center">
        <div class="col-md-10" style="text-align-center">
            <table class="tableall table-striped mt-2 text-center mb-2">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Dias que se ofrece</th>
                        <th scope="col">Horario</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="col">Tramite 1</td>
                        <td scope="col">Lunes, Miercoles, Viernes</td>
                        <td scope="col">9:00 - 16:00</td>
                        <td scope="col"></td>
                    </tr>
                </tbody>
            </table>
            <a class="button button1" href="{{route('eventos.create')}}">Crear Evento</a>
        </div>
    </div>
    
    
@endsection
