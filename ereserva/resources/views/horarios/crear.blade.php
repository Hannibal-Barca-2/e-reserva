@extends('layouts.app')
@section('title')

@endsection

@section('content')
    <div class="container">
        <table class="tablas table-striped mt-2 text-center align-items-center" style="overflow-x:auto; margin: 0 auto;">
            <thead>
                <tr>
                    <th scope="col">Dia</th>
                    <th scope="col">Hora de Inicio</th>
                    <th scope="col">Status</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($horarios as $horario)
                    <tr>
                        <td scope="col">{{ $horario->Dia }}</td>
                        <td scope="col">{{ $horario->Hora }}</td>
                        @if($horario->Status == 'Disponible'){
                            <td scope="col" style="color:green">{{ $horario->Status }}</td>
                        @else 
                            <td scope="col" style="color:red">{{ $horario->Status }}</td>
                        @endif
                        <td scope="col">
                            <a class="btn btn-danger" href="{{ route('horarios.eliminar', $horario->id) }}"><i
                                    class="fa-solid fa-ban"></i></a>
                            <a class="btn btn-primary" href="{{ route('horarios.edit', $horario->id) }}"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-12 col-lg-6 align-self-center">
            <form action="{{ route('horarios.agregar', $idEvento) }}" method="POST">
                @csrf
                <p>
                    Dia:
                    <input name="Dia" type="date" class="form-control mb-2" />
                </p>
                <p>
                    Hora de inicio:
                    <input name="Hora" type="time" class="form-control mb-2" />
                </p>
                <button class="button button1 mb-1" type="submit">Agregar</button>
            </form>
        </div>
    </div>
@endsection
