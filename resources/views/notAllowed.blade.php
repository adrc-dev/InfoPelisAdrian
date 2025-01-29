@extends('layout');

@section('title', 'Acceso restricto')

@section('main')
    <h1>⚠️ ACCESO NO AUTORIZADO ⚠️</h1>
    <div class="filmContainer">
        <div class="subtitle">
            Debes iniciar session con una cuenta con privilegios para crear o editar peliculas.
        </div>
        <a href="{{ route('login') }}">Iniciar session</a>
        <br>
        <a href="{{ route('signup') }}">Registrar-se</a>
    </div>

@endsection
