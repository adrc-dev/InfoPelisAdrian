@extends('layout')

@section('title', 'Pelicula ' . $id)

@section('main')
    <h1>Ficha de la pelicula {{$id}}</h1>
    <a href="{{route('movies.edit', ['movie' => $id])}}">Editar pelicula.</a>
@endsection
