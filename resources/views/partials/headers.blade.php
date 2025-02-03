<header>
    <a href="{{ route('index') }}"><img id="indexLogo" src="{{ asset('images/infopelis.jpeg') }}" alt="logo infopelis"></a>
    <div class="header-logos">
        <a href="{{ route('movies.index') }}"><img id="moviesLogo" class="logo"
                src="{{ asset('images/peliculas.png') }}" alt="logo entradas"></a>

        <a href="{{ route('actors') }}"><img class="logo" src="{{ asset('images/actor.png') }}" alt="logo actores"></a>

        <a href="{{ route('movies.create') }}"><img class="logo" src="{{ asset('images/agregar.png') }}" alt="logo agregar pelicula"></a>

        <div class="userContainer">
            <a href="{{ route('login') }}">
                <img class="logo userLogo" src="{{ asset('images/user.png') }}"alt="logo de user">
                <div class="textLogo">
                    {{ Auth::check() ? Auth::user()->nickname : 'Log in' }}
                </div>
            </a>
        </div>
    </div>
</header>
