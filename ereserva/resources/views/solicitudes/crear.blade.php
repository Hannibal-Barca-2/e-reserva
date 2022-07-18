@extends('user_layouts.app')

@section('title')
    Solicitud para {{ $nombreEvento[0]->NombreEvento }}
@endsection

@section('content')
    <cliente-component  :array_dias="{{ $array_dias }}"
                        :id_evento="{{ $id_evento }}" ></cliente-component>
@endsection

@section('scripts')
<script>
    
</script>
@endsection
