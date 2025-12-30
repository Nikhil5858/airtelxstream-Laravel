<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageSection extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'type',
        'position',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function movies()
    {
        return $this->belongsToMany(
            Movie::class,
            'homepage_section_movies'
        )
        ->withPivot('position')
        ->orderBy('homepage_section_movies.position');
    }

    public static function nextPosition(): int
    {
        return (int) static::max('position') + 1;
    }
}
