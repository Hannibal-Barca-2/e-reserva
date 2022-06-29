@extends('layouts.app')
@section('title')
    Nuevo evento
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-lg-6 align-self-center">
            <form>
                <p>
                    Dia:
                    <input type="date" class="form-control mb-2" />
                </p>
                <p>
                    Hora de inicio:
                    <input type="time" class="form-control mb-2" />
                    Hora de fin:
                    <input type="time" class="form-control mb-2" />
                </p>
            </form>
            <a class="button button1" href="">Crear</a>
        </div>
    </div>
@endsection
