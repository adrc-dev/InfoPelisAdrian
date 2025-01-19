<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $table = 'gender';
    public function movie_casts() {
        return $this->hasMany(Movie_cast::class);
    }
}
