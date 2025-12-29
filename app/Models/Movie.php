<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title', 'description', 'release_year', 'language', 'type',
        'movie_url', 'trailer_url', 'banner_url', 'poster_url',
        'is_free', 'is_new_release', 'is_feature', 'is_banner',
        'genre_id', 'ott_id',
    ];

    protected $casts = [
        'is_free' => 'boolean',
        'is_new_release' => 'boolean',
        'is_feature' => 'boolean',
        'is_banner' => 'boolean',
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function ott()
    {
        return $this->belongsTo(OttProvider::class);
    }

    // public function watchlists()
    // {
    //     return $this->hasMany(Watchlist::class);
    // }

    protected function posterUrl(): Attribute
    {
        return Attribute::make(
            // accessor
            get: fn ($value) => $value ? asset('assets/images/'.$value) : null,
        );
    }

    protected function bannerUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? asset('assets/images/'.$value) : null,
        );
    }

    protected function movieUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? asset('assets/videos/'.$value) : null,
        );
    }

    protected function trailerUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? asset('assets/videos/'.$value) : null,
        );
    }
}
