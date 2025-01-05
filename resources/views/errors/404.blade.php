@extends('layout')

@section('title', 'ERROR 404')

@section('main')
    <h1>No se ha encontrado la pagina 😭</h1>
    <a href="{{route('index')}}"><button>Volver</button></a>
@endsection

