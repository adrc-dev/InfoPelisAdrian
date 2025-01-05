@extends('layout')

@section('title', 'Pelicula ' . $id)

@section('main')
    <h1>Ficha de la pelicula {{ $id }}</h1>
    {{-- TODO arreglar para que solo sea accesible con rol admin --}}
    <a href="{{ route('movies.edit', ['movie' => $id]) }}">Editar pelicula.</a>
@endsection
