@extends('layouts.app')
@section('title')
    Citas
@endsection

@section('content')
    <div class="row align-items-center">
        <div class="col-md-10" style="text-align-center">
            <table class="table-striped mt-2 text-center" style="overflow-x: auto;">
                <thead>
                    <tr>
                        <th scope="col">Id Cita</th>
                        <th scope="col">Evento</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Nombre del solicitante</th>
                        <th scope="col">Apellido del solicitante</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Tramite 1</td>
                        <td>27/06/2022</td>
                        <td>13:00</td>
                        <td>Alejandro</td>
                        <td>González</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Tramite 3</td>
                        <td>27/06/2022</td>
                        <td>11:00</td>
                        <td>Melissa</td>
                        <td>López</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
