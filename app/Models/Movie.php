<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movie';
    public $timestamps = false; // para que no ponga el updated_at en las actualizaciones de las tablas

    public function movie_cast() {
        return $this->hasMany(Movie_cast::class);
    }

    /**
     * Get all of the movie_crew for the person
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movie_crew() {
        return $this->hasMany(Movie_crew::class);
    }

    public function getRouteKeyName() {
        return 'slug';
    }
}
