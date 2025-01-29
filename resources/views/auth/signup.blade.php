@extends('layout')

@section('title', 'Registro')

@section('main')
    <h1>Registro de usuarios</h1>
    <div class="filmContainer">
        <form action="{{ route('signup') }}" method="post">
            @csrf

            <label for="name">Nombre:</label>
            @error('name') <span class="error">{{ $message }}</span> @enderror
            <input type="text" name="name" id="name" value="{{ old('name') }}">

            <label for="surname">Apellido:</label>
            @error('surname') <span class="error">{{ $message }}</span> @enderror
            <input type="text" name="surname" id="surname" value="{{ old('surname') }}">

            <label for="nickname">Nick:</label>
            @error('nickname') <span class="error">{{ $message }}</span> @enderror
            <input type="text" name="nickname" id="nickname" value="{{ old('nickname') }}">

            <label for="email">Correo:</label>
            @error('email') <span class="error">{{ $message }}</span> @enderror
            <input type="text" name="email" id="email" value="{{ old('email') }}">

            <label for="password">Contraseña:</label>
            @error('password') <span class="error">{{ $message }}</span> @enderror
            <input type="password" name="password" id="password">

            <label for="confirmPass">Repite la contraseña</label>
            @error('confirmPass') <span class="error">{{ $message }}</span> @enderror
            <input type="password" name="confirmPass" id="confirmPass">

            <input type="submit" value="Entrar">
        </form>
    </div>
@endsection
