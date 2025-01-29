@extends('layout')

@section('title', 'Lista peliculas')

@section('main')
    <h1>Listado de peliculas.</h1>
    @forelse ($movies as $movie)
        <div class="filmContainer">
            <div class="subtitle">Titulo:
                <a href="{{ route('movies.show', $movie->slug) }}">
                    {{ $movie->title }}
                </a>
            </div>
            <div>Nota: {{ $movie->vote_average }}</div>
            <div>Sinopsis: {{ \Illuminate\Support\Str::limit($movie->overview, 200) }}</div> {{-- limita a 200 caracteres --}}
        </div>
    @empty
        <div class="filmContainer">
            <div>Ninguna pelicula encontrada.</div>
        </div>
    @endforelse

    {{ $movies->links() }}
@endsection
