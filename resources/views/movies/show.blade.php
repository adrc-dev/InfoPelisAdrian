@extends('layout')

@section('title', 'Pelicula ' . $movie->title)

@section('main')
    <h1>Ficha de la pelicula {{ $movie->title }}</h1>
    <div class="filmContainer">
        <div>ID: {{ $movie->id }}</div>
        <div>Titulo: {{ $movie->title }}</div>
        <div>Presupuesto: {{ $movie->budget }}</div>
        <div>Pagina oficial: <a href="{{ $movie->homepage }}">{{ $movie->homepage }}</a></div>
        <div>Resumen: {{ $movie->overview }}</div>
        <div>Popularidad: {{ $movie->popularity }}</div>
        <div>Fecha de lanzamiento: {{ $movie->release_date }}</div>
        <div>Ingresos vendidos: {{ $movie->revenue }}</div>
        <div>Duracion: {{ $movie->runtime }}</div>
        <div>Estado: {{ $movie->movie_status }}</div>
        <div>Frase famosa: {{ $movie->tagline }}</div>
        <div>Nota: {{ $movie->vote_average }}</div>
        <div>Votos contados: {{ $movie->vote_count }}</div>

        {{-- TODO arreglar para que solo sea accesible con rol admin --}}
        {{-- formulario para enviar la movie_id a movies.destroy (tiene que ser form) --}}
        <form action="{{ route('movies.destroy', ['movie' => $movie->id]) }}" method="post">
            @csrf {{-- evitar ataques --}}
            @method('delete') {{-- obligatorio definir el method --}}
            <button type="submit" class="delete">
                <img id="moviesLogo" class="logo" src="{{ asset('images/borrar.png') }}" alt="logo para borrar">
            </button>
        </form>
    </div>

    {{-- TODO arreglar para que solo sea accesible con rol admin --}}
    {{-- enviar la movie_id a movies.edit --}}
    <a href="{{ route('movies.edit', ['movie' => $movie->id]) }}">Editar pelicula.</a>
@endsection
