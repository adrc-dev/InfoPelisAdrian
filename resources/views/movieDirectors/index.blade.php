@extends('layout')

@section('title', 'Directores')

@section('main')

    <h1>Listado de directores</h1>
    <div class="containerFilms">
        @forelse ($directors as $director)
            <div class="filmContainer">
                <div>Nombre: <a href="{{ route('persons.show', $director->id) }}">{{ $director->person_name }}</a></div>
                <div>Peliculas dirigidas:
                    @php
                        $titles = $director->movie_crew->map(function ($film) {
                                return $film->movie->title;
                            })->implode(', ');
                        $titlesLimited = \Illuminate\Support\Str::limit($titles, 80);
                    @endphp
                    {{ $titlesLimited }}
                </div>
            </div>
        @empty
            <div>No hay directores.</div>
        @endforelse
    </div>
    {{ $directors->links() }}
@endsection
