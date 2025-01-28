@extends('layout')

@section('title', 'Editar pelicula')

@section('main')
    <h1>{{ $movie->title }}</h1>

    <div class="filmContainer">
        <form action="{{ route('movies.update', $movie->slug) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <label for="title">Título:</label>
            @error('title') <span class="error">{{ $message }}</span> @enderror
            <input type="text" id="title" name="title" value="{{ old('title', $movie->title) }}" >

            <label for="budget">Presupuesto:</label>
            @error('budget') <span class="error">{{ $message }}</span> @enderror
            <input type="number" id="budget" name="budget" value="{{ old('budget', default: $movie->budget) }}">

            <label for="homepage">Página oficial:</label>
            @error('homepage') <span class="error">{{ $message }}</span> @enderror
            <input type="text" id="homepage" name="homepage" value="{{ old('homepage', $movie->homepage) }}">

            <!-- TODO DEJAR BONITO -->
            <label for="overview">Resumen:</label>
            @error('overview') <span class="error">{{ $message }}</span> @enderror
            <input type="text" id="overview" name="overview" value="{{ old('overview', $movie->overview) }}">

            <label for="popularity">Popularidad:</label>
            @error('popularity') <span class="error">{{ $message }}</span> @enderror
            <input type="number" id="popularity" name="popularity" value="{{ old('popularity', $movie->popularity) }}" step="0.000001">

            <label for="release_date">Fecha de lanzamiento:</label>
            @error('release_date') <span class="error">{{ $message }}</span> @enderror
            <input type="date" id="release_date" name="release_date" value="{{ old('release_date', $movie->release_date ? $movie->release_date : '') }}">

            <label for="revenue">Ingresos vendidos:</label>
            @error('revenue') <span class="error">{{ $message }}</span> @enderror
            <input type="number" id="revenue" name="revenue" value="{{ old('revenue', $movie->revenue) }}">

            <label for="runtime">Duración:</label>
            @error('runtime') <span class="error">{{ $message }}</span> @enderror
            <input type="number" id="runtime" name="runtime" value="{{ old('runtime', $movie->runtime) }}">

            <label for="movie_status">Estado:</label>
            @error('movie_status') <span class="error">{{ $message }}</span> @enderror
            <input type="text" id="movie_status" name="movie_status" value="{{ old('movie_status', $movie->movie_status) }}">

            <label for="tagline">Frase famosa:</label>
            @error('tagline') <span class="error">{{ $message }}</span> @enderror
            <input type="text" id="tagline" name="tagline" value="{{ old('tagline', $movie->tagline) }}">

            <label for="vote_average">Nota:</label>
            @error('vore_average') <span class="error">{{ $message }}</span> @enderror
            <input type="number" id="vote_average" name="vote_average" value="{{ old('vote_average', $movie->vote_average) }}" step="0.01">

            <label for="vote_count">Votos contados:</label>
            @error('vote_count') <span class="error">{{ $message }}</span> @enderror
            <input type="number" id="vote_count" name="vote_count" value="{{ old('vote_count', $movie->vote_count) }}">


            {{-- TODO descubrir porque no me salen los errores --}}
            <label for="img">Imagen:</label>
            @error('vote_count') <span class="error">{{ $message }}</span> @enderror
            <input type="file" name="img" id="img">

            <input type="submit" value="Enviar">
        </form>
    </div>
@endsection
