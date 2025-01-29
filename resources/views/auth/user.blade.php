@extends('layout')

@section('title', $user->nickname)

@section('main')

    @if (session('message'))
        <h1>{{ session('message') . $user->name }}</h1>
    @else
        <h1>Hola {{ $user->name }}</h1>
    @endif

    <div class="loginContainer">
        <div>Esta es tu informacion:</div>
        <div>Nombre: {{ $user->name }}</div>
        <div>Apellido: {{ $user->surname }}</div>
        <div>Nick: {{ $user->nickname }}</div>
        <div>Correo electronico: {{ $user->email }}</div>
        <div>Rol: {{ $user->rol }}</div>

        <form action="{{ route('logout') }}" method="post">
            @csrf
            <input type="submit" value="Salir">
        </form>
    </div>
@endsection
