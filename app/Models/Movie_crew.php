<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie_crew extends Model
{
    protected $table = 'movie_crew';
    public $timestamps = false;

    /**
     * Get the person that owns the Movie_crew
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function movie() {
        return $this->belongsTo(Movie::class);
    }

    /**
     * Get the person that owns the Movie_crew
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person() {
        return $this->belongsTo(Person::class);
    }
}
