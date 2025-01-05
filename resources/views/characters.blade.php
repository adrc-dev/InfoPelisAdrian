<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Characters</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @include('partials.headers')
    <div class="containerFilms">
        @forelse ($characters as $character)
            <div class="filmContainer">
                <div class="character">Personaje: {{ $character->character_name }}</div>
                <div class="name">Actor: {{ $character->person_name }}</div>
                <div class="genre">Sexo: {{ $character->gender }}</div>
            </div>
        @empty
            <div>No hay articulos.</div>
        @endforelse
    </div>
    @include('partials.footer')
</body>

</html>
