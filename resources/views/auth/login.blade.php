@extends('layout')

@section('title', 'Log in')

@section('main')
    <h1>Log in</h1>

    @if (session('message'))
        <div>{{ session('message') }}</div>
    @elseif (isset($error))
        <div class="error">{{ $error }}</div>
    @endif

    <div class="filmContainer loginContainer">
        <form action="{{ route('login') }}" method="post">
            @csrf

            <label for="email">Correo:</label>
            @error('email') <span class="error">{{ $message }}</span> @enderror
            <input type="text" name="email" id="email" value="{{ old('email') }}">

            <label for="password">Contraseña:</label>
            @error('password') <span class="error">{{ $message }}</span> @enderror
            <input type="password" name="password" id="password">

            <label for="remember">
                <input type="checkbox" name="remember" id="remember"> Recordarme
            </label>

            <input type="submit" value="Entrar">
        </form>

        <a href="{{ route('signup') }}">
            <img class="logo" src="{{ asset('images/signup.png') }}" alt="logo de signup">
            <br>
            Registrar-se
        </a>
    </div>
@endsection
