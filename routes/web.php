<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieDirectorController;
use App\Http\Controllers\PersonController;

// index de infopelis
Route::get('/', function () {
    return view('index');
})->name('index');

/*
// index de movies
Route::get('movies', function () {
    return view('movies.list');
})->name('movies');

// informacion especifica de movie
Route::get('movies/{id}', function ($id) {
    return view('movies.movie', compact('id'));
})->whereNumber('id')->name('movie');

// informacion de los pesonajes
Route::get('characters/{id?}', function ($id = null) {
    // guardamos la ruta del json
    $jsonUrl = asset('UD09.01_Practica_9.2.2.json');
    // decodificamos el json
    $jsonContent = file_get_contents($jsonUrl);
    $characters = json_decode($jsonContent);
    // pasamos la vista con la variable characters y id
    return view('characters', compact('characters', 'id'));
})->name('characters');
*/


// ruta characters
Route::get('movies/{movie}/characters', [MovieController::class, 'characters'])->name('movies.characters');

// ruta actores
Route::get('actors', [PersonController::class, 'actors'])->name('actors');

// rutas de users
Route::get('signup', [LoginController::class, 'signupForm'])->name('signupForm');
Route::post('signup', [LoginController::class, 'signup'])->name('signup');
Route::get('login', [LoginController::class, 'loginForm'])->name('loginForm');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('user', [LoginController::class, 'user'])->name('auth.user')->middleware('auth');

// ruta controlador de movies
Route::resource('movies', MovieController::class)
    ->parameters(['movie' => 'slug'])
    ->missing(function (Request $request) {
        return Redirect::route('movies.index');
    });

// middleware para que solo sea accesible logueado.
Route::middleware('auth')->group(function () {
    Route::get('movies/create', [MovieController::class, 'create'])->name('movies.create');
    Route::get('movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');
});

// ruta controlador de persons
Route::resource('persons', PersonController::class)->only(['show']);
