@extends('layouts.app')

@section('title')
Solicitudes
@endsection

@section('content')
    
        <div class="row align-items-center">
            <div class="col-md-10 justify-content-center" style="text-align-center">
                <table class="table-striped mt-2 text-center" style="overflow-x: auto;">
                    <thead>
                        <tr>
                            <th scope="col">Id Solicitud</th>
                            <th scope="col">Evento</th>
                            <th scope="col">Fecha de envio</th>
                            <th scope="col">Fecha solicitada</th>
                            <th scope="col">Hora solicitada</th>
                            <th scope="col">Nombre Solicitante</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Tramite 1</td>
                            <td>20/06/2022</td>
                            <td>23/06/2022</td>
                            <td>13:00</td>
                            <td>Alejandro Gonzalez</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Tramite 3</td>
                            <td>20/06/2022</td>
                            <td>27/06/2022</td>
                            <td>11:00</td>
                            <td>Melissa López</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    
@endsection
