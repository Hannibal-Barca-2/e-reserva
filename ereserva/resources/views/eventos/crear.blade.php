@extends('layouts.app')
@section('title')
    Nuevo evento
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-lg-6 align-self-center">
        <form action="{{route('eventos.store')}}" method="POST">
            @csrf
            <p>
                Nombre:
                <input
                    type="text"
                    name="NombreEvento"
                    placeholder="Nombre"
                    class="form-control"
                />
            </p>
            <p>
                Descripción:
                <textarea
                    name="Descripcion"
                    id="descripcion"
                    cols="30"
                    rows="3"
                    class="form-control"
                    placeholder="Descripción del evento"
                ></textarea>
            </p>
            <a class="button button1" type="submit" href="{{ route('eventosstore')}}">Siguiente</a>
        </form>
    </div>
</div>
@endsection

