<header>
    <a href="{{ route('index') }}"><img id="indexLogo" src="{{ asset('images/infopelis.jpeg') }}" alt="logo infopelis"></a>
    <div class="header-logos">
        <a href="{{ route('movies.index') }}"><img id="moviesLogo" class="logo" src="{{ asset('images/peliculas.png') }}"
                alt="logo entradas"></a>
        <a href="{{ route('movieDirectors.index') }}"><img class="logo" src="{{ asset('images/director.png') }}"
                alt="logo directores"></a>
        <a href="{{ route('actors') }}"><img class="logo" src="{{ asset('images/actor.png') }}"
                alt="logo actores"></a>

        {{-- TODO arreglar para que solo sea accesible con rol admin --}}
        <a href="{{ route('movies.create') }}"><img class="logo" src="{{ asset('images/agregar.png') }}"
                alt="logo agregar pelicula"></a>
    </div>
</header>
