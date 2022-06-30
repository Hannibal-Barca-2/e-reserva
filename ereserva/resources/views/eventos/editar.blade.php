@extends('layouts.app')
@section('title')
    Editar {{ $nombreEvento[0]->NombreEvento }}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-lg-6 align-self-center">
            <form action="{{ route('eventos.update', $nombreEvento[0]->id) }}" method="POST">
                @method('PUT')
                @csrf
                <p>
                    Nombre:
                    <input type="text" name="NombreEvento" placeholder="Nombre" class="form-control" />
                </p>
                <p>
                    Descripción:
                    <textarea name="Descripcion" id="descripcion" cols="30" rows="3" class="form-control"
                        placeholder="Descripción del evento"></textarea>
                </p>
                <button class="button button1" type="submit">Editar evento</button>
            </form>
            <table class="tablas table-striped mt-2 text-center align-items-center"
                style="overflow-x:auto; margin: 0 auto;">
                <thead>
                    <tr>
                        <th scope="col">Dia</th>
                        <th scope="col">Hora de Inicio</th>
                        <th scope="col">Hora Fin</th>
                        <th scope="col">Status</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($horarios as $horario)
                        <tr>
                            <td scope="col">{{ $horario->Dia }}</td>
                            <td scope="col">{{ $horario->HoraInicio }}</td>
                            <td scope="col">{{ $horario->HoraFin }}</td>
                            <td scope="col">{{ $horario->Status }}</td>
                            <td scope="col">
                                <a class="btn btn-danger" href=""><i class="fa-solid fa-ban"></i></a>
                                <a class="btn btn-primary" href=""><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <form action="{{ route('horarios.create', $evento) }}" method="POST">
                @csrf
                <p>
                    Dia:
                    <input name="Dia" type="date" class="form-control mb-2" />
                </p>
                <p>
                    Hora de inicio:
                    <input name="HoraInicio" type="time" class="form-control mb-2" />
                    Hora de fin:
                    <input name="HoraFin" type="time" class="form-control mb-2" />
                </p>
                <button class="button button1" type="submit">Agregar Horario</button>
            </form>
        </div>
    </div>
@endsection
