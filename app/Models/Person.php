<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'person';

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
}
