@extends('layout')

@section('title', 'Casting de ' . $movie->title)

@section('main')
    <h1>{{ $movie->title }}</h1>
    <div class="containerFilms">
        @forelse ($movie->movie_cast as $character)
            <div class="filmContainer">
                <div class="character">Personaje: {{ $character->character_name }}</div>
                <div class="name">Actor:
                    <a href="{{ route('persons.show', $character->person->id) }}">
                        {{ $character->person->person_name }}
                    </a>
                </div>
                <div class="genre">Sexo: {{ $character->gender->gender }}</div>
            </div>
        @empty
            <div>No hay articulos.</div>
        @endforelse
    </div>

@endsection
