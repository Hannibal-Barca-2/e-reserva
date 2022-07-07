@extends('user_layouts.app')

@section('title')
    Solicitud para {{ $nombreEvento[0]->NombreEvento }}
@endsection

@section('content')
    <h4>{{ $array_dias }}</h4>
    <cliente-component :array_horas="{{ $array_horas }}" :array_dias="{{ $array_dias }}"></cliente-component>
@endsection

@section('scripts')
<script>

</script>
@endsection
