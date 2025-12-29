<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Episode extends Model
{
    protected $fillable = [
        'season_id',
        'episode_number',
        'title',
        'description',
        'video_url',
        'poster_img',
    ];

    public function season()
    {
        return $this->belongsTo(Seasons::class);
    }

    protected function posterImg(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? asset('assets/images/'.$value) : null,
        );
    }

    protected function videoUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? asset('assets/videos/'.$value) : null,
        );
    }
}
