<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('head_title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" style="height: 100vh;">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="height:10%;">
            <div class="container justify-content-center">
                <a class="navbar-brand" href="{{ route('guest_home') }}">
                    @yield('main_title')
                </a>
                <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> -->
            </div>
        </nav>

        <main class="py-4 container"style="height:80%;">
            @section('main')
            @show
        </main>
        <footer style="height:10%;">
            <p class="text-center">&copy; Cafe.スマレジ</p>
        </footer>
    </div>
</body>
</html>
