<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seasons extends Model
{
    protected $fillable = [
        'movie_id',
        'season_number',
        'episode_number',
        'release_year',
        'genre_id',
        'ott_id',
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function ott()
    {
        return $this->belongsTo(OttProvider::class);
    }
}
