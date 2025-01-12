<?php

use Illuminate\Support\Facades\Route;
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

// ruta controlador de movies
Route::resource('movies', MovieController::class)->except(['store', 'update', 'destroy']);

// ruta controlador de persons
Route::resource('persons', PersonController::class)->only(['show']);

// ruta actores
Route::get('actors', [PersonController::class, 'actors'])->name('actors');

// ruta controlador movieDirector
Route::resource('movieDirectors', MovieDirectorController::class)->only(['index', 'show']);
