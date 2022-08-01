@extends('layouts.auth_app')
@section('title')
    Iniciar Sesión
@endsection
@section('content')
    <div class="container">
        <form method="POST">
            @csrf
            <label class="pb-2">
            <p class="m-0">E-mail:</p>
                <input type="email"
                    class="border border-gray-200 rounded-md bg-gray-200 w-full
            text-lg placheholder-gray-900 p-2 my-2 focus:bg-white"
                    placeholer="Ingrese su Email" id="email" name="email">
            </label><br>
            <label class="pb-2">
            <p class="m-0">Contraseña:</p>
                <input type="password" placeholder="Ingrese su Contraseña"
                    class="border border-gray-200 rounded-md bg-gray-200 w-full
            text-lg placheholder-gray-900 p-2 my-2 focus:bg-white"
                    placeholder="Ingrese su contraseña" id="password" name="password">
            </label><br>

            @error('message')
                <p class="border border-red-500 rounded-md bg-red-100 w-full
                text-red-600 p-2 my-2">{{$message}}</p>
            @enderror

            <button type="submit"
                class="button_login">Iniciar
                sesión</button>
            {{-- <a href="{{ route('registro') }}"
                class="registrarse my-2">Registrarse</a> --}}
        </form>
    </div>
@endsection
