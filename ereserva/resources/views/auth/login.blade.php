<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200
rounded-lg shadow-lg">
    <h1 class="text-3x1 text-center font-bold">Iniciar Sesión</h1>
    <form method="POST">

        @csrf
        <label class="pb-2">
            <input type="email" class="border border-gray-200 rounded-md bg-gray-200 w-full
            text-lg placheholder-gray-900 p-2 my-2 focus:bg-white" placeholer="Ingrese su Email"
            id="email" name="email">
        </label><br>
        <label class="pb-2">
            <input type="password" placeholder="Ingrese su Contraseña" class="border border-gray-200 rounded-md bg-gray-200 w-full
            text-lg placheholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Ingrese su contraseña"
            id="contraseña" name="contraseña">
        </label><br>
        <button type="submit" class="rounded-md bg-indigo-500 w-full text-lg
        text-white font-semibold p-2 my-3 hover:bg-indigo-600">Iniciar sesión</button>

    </form>

</div>
