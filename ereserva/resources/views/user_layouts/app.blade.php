<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">

</head>

<div class="container"> @yield('section') </div>

<body class="body">
    <div id="app">
        <nav>
            @include('user_layouts.header')
        </nav>
        <main class="system_body">
            <section class="section">
                <div>
                    <h3>@yield('title')</h3>
                </div>
                <div class="col-lg-12 px-0 px-md-auto">
                    <div class="card">
                        <div class="card-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <footer>
            @include('user_layouts.footer')
        </footer>
    </div>
</body>

</html>