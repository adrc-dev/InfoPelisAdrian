<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        {{-- titulo --}}
        @yield('title')
    </title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    {{-- header --}}
    @include('partials.headers')

    {{-- main --}}
    <div class="container">
        @yield('main')
    </div>

    {{-- footer --}}
    @include('partials.footer')
</body>

</html>
