<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie_cast extends Model
{
    protected $table = 'movie_cast';
    public function movie() {
        return $this->belongsTo(Movie::class);
    }

    public function person() {
        return $this->belongsTo(Person::class);
    }

    public function gender() {
        return $this->belongsTo(Gender::class);
    }
}
