@extends('layout')

@section('title', $person->person_name)

@section('main')
    <h1>{{ $person->person_name }}</h1>
    <div class="filmContainer">
        Peliculas que actuo:
        @foreach ($person->movie_cast as $movies)
            <a href="{{ route('movies.show', $movies->movie->slug) }}">
                {{ $movies->movie->title }}
            </a>
            @if (!$loop->last)
                ,
            @else
                .
            @endif
        @endforeach
    </div>
    <div class="filmContainer">
        Peliculas que dirigio:
        @foreach ($moviesFromDirector as $mov)
            <a href="{{ route('movies.show', $mov->movie->slug) }}">
                {{ $mov->movie->title }}
            </a>
            @if (!$loop->last)
                ,
            @else
                .
            @endif
        @endforeach

    </div>
@endsection
