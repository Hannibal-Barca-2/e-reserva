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
        </div>
    </div>
@endsection
