@extends('layout')

@section('title', 'Actores')

@section('main')
    <h1>Listado de actores</h1>
    <div class="containerFilms">
        @forelse ($actors as $actor)
            <div class="filmContainer">
                <div>Nombre: <a href="{{ route('persons.show', $actor->id) }}">{{ $actor->person_name }}</a></div>
                <div>Peliculas:
                    @php
                        $titles = $actor->movie_cast->map(function ($film) {
                                return $film->movie->title;
                            })->implode(', ');
                        $titlesLimited = \Illuminate\Support\Str::limit($titles, 80);
                    @endphp
                    {{ $titlesLimited }}
                </div>
            </div>
        @empty
            <div>No hay actores.</div>
        @endforelse
    </div>

    {{ $actors->links() }}
@endsection
