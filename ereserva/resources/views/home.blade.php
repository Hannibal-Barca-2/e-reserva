@extends('layouts.app')

@section('title')
    Solicitudes
@endsection

@section('content')
    {{-- <div class="row align-items-center"> --}}
    {{-- <div class="col-md-10 justify-content-center" style="text-align-center"> --}}
    <table class="tablas table-striped mt-2 text-center align-items-center" style="overflow-x:auto; margin: 0 auto;">
        <thead>
            <th scope="col">Evento</th>
            <th scope="col">Fecha de envio</th>
            <th scope="col">Fecha solicitada</th>
            <th scope="col">Hora solicitada</th>
            <th scope="col">Nombre Solicitante</th>
            <th scope="col">Email</th>
            <th scope="col">Numero Teléfonico</th>
            <th scope="col">Acciones</th>
        </thead>
        <tbody>
            @foreach ($solicitudes as $solicitud)
                <tr>
                    <td>{{ $solicitud->NombreEvento }}</td>
                    <td>{{ $solicitud->FechaEnvio }}</td>
                    <td>{{ $solicitud->FechaSolicitada }}</td>
                    <td>{{ $solicitud->HoraSolicitada }}</td>
                    <td>{{ $solicitud->NombreSolicitante }}</td>
                    <td>{{ $solicitud->Email }}</td>
                    <td>{{ $solicitud->NumeroTelefono }}</td>
                    <td>
                        <form>
                            <a class="btn btn-success" href="{{ route('solicitudes.aceptar',$solicitud->id) }}"><i class="fa-solid fa-circle-plus"></i></a>
                            <a class="btn btn-danger" href="{{ route('solicitudes.rechazar', $solicitud->id) }}"><i class="fa-solid fa-ban"></i></a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- </div> --}}
    {{-- </div> --}}
@endsection

{{-- <script>
    console.log($solicitudes);
</script> --}}
