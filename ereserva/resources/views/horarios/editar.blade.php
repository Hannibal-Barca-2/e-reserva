@extends('layouts.app')
@section('title')
    Editar Horario
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-lg-6 align-self-center">
        <form action="{{ route('horarios.update', $horario[0]->id) }}" method="POST">
            @method('PUT')
            @csrf
            <p>
                Dia:
                <input name="Dia" type="date" class="form-control mb-2" value="{{$horario[0]->Dia}}"/>
            </p>
            <p>
                Hora de inicio:
                <input name="HoraInicio" type="time" class="form-control mb-2" value="{{$horario[0]->Hora}}"/>
            </p>
            <button class="button button1" type="submit">Editar</button>
        </form>
    </div>
</div>
@endsection