@extends('layouts.auth_app')
@section('title')
    Registrarse
@endsection
@section('content')
    <form method="POST">
        @csrf
        <label class="pb-2">
        <input type="name"
            class="border border-gray-200 rounded-md bg-gray-200 w-full
        text-lg placheholder-gray-900 p-2 my-2 focus:bg-white"
        placeholder="Ingrese su nombre" id="name" name="name">
        </label><br>
        <label class="pb-2">
        <input type="email"
            class="border border-gray-200 rounded-md bg-gray-200 w-full
            text-lg placheholder-gray-900 p-2 my-2 focus:bg-white"
            placeholer="Ingrese su Email" id="email" name="email">

        @error('email')
            <p class="border border-red-500 rounded-md bg-red-100 w-full
            text-red-600 p-2 my-2">* Error</p>
        @enderror
        </label><br>
        <label class="pb-2">
        <input type="password" placeholder="Ingrese su Contraseña"
            class="border border-gray-200 rounded-md bg-gray-200 w-full
            text-lg placheholder-gray-900 p-2 my-2 focus:bg-white"
            placeholder="Ingrese su contraseña" id="password" name="password">

        @error('password')
            <p class="border border-red-500 rounded-md bg-red-100 w-full
        text-red-600 p-2 my-2">* Error</p>
        @enderror
        </label><br>
        <label class="pb-2">
        <input type="password" placeholder="Ingrese su Contraseña"
            class="border border-gray-200 rounded-md bg-gray-200 w-full
            text-lg placheholder-gray-900 p-2 my-2 focus:bg-white"
            placeholder="Ingrese de nuevo su contraseña" id="password_cofirmation" name="password_cofirmation">
        </label><br>
        <button type="submit"
            class="button">Crear</button>
    </form>
@endsection

