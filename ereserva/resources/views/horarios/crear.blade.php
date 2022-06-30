@extends('layouts.app')
@section('title')
    Agregar Horario
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-lg-6 align-self-center">
        <form action="{{ route('horarios.store') }}" method="POST">
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
            <button class="button button1" type="submit">Agregar</button>
        </form>
    </div>
</div>
@endsection