@extends('layout')

@section('title', 'Pelicula ' . $movie->title)

@section('main')
    <h1>Ficha de la pelicula {{ $movie->title }}</h1>
    <div class="filmContainer">
        <div class="content">
            <div>ID: {{ $movie->id }}</div>
            <div>Director:
                @isset($director->person->id)
                    <a href="{{ route('persons.show', $director->person->id) }}">
                        {{ $director->person->person_name }}
                    </a>
                @endisset
            </div>
            <div>Titulo: {{ $movie->title }}</div>
            <div>Presupuesto: {{ $movie->budget }}</div>
            <div>Pagina oficial:
                <a href="{{ $movie->homepage }}">
                    {{ $movie->homepage }}
                </a>
            </div>
            <div>Resumen: {{ $movie->overview }}</div>
            <div>Popularidad: {{ $movie->popularity }}</div>
            <div>Fecha de lanzamiento: {{ $movie->release_date }}</div>
            <div>Ingresos vendidos: {{ $movie->revenue }}</div>
            <div>Duracion: {{ $movie->runtime }}</div>
            <div>Estado: {{ $movie->movie_status }}</div>
            <div>Frase famosa: {{ $movie->tagline }}</div>
            <div>Nota: {{ $movie->vote_average }}</div>
            <div>Votos contados: {{ $movie->vote_count }}</div>

            <div>
                Actores:
                @foreach ($movie->movie_cast->take(10) as $char)
                    {{-- TODO Comprobar si el profe quiere que estos nombre sean rutas tambien. --}}
                    <a href="{{ route('persons.show', $char->person->id) }}">{{ $char->person->person_name }}</a>,
                @endforeach

                @if ($movie->movie_cast->count() > 10)
                    <a href="{{ route('movies.characters', ['movie' => $movie->slug]) }}">Resto del Casting</a>.
                @endif
            </div>

            @if (Auth::user()->rol == 'admin')
                <form action="{{ route('movies.destroy', ['movie' => $movie->slug]) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="delete">
                        <img id="moviesLogo" class="logo" src="{{ asset('images/borrar.png') }}" alt="logo para borrar">
                    </button>
                </form>
            @endif


        </div>
        <div class="imgContainer">
            @if ($movie->image == null)
                <img class="image" src="{{ asset(  'images/default.png') }}"
                    alt="Imagen de {{ $movie->title }}">
            @else
                <img class="image" src="{{ asset($moviePath . $movie->image) }}"
                    alt="Imagen de {{ $movie->title }}">
            @endif
        </div>
    </div>
    <a href="{{ route('movies.edit', ['movie' => $movie->slug]) }}">Editar pelicula.</a>
@endsection
