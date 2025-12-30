<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageSectionMovie extends Model
{
    protected $fillable = [
        'homepage_section_id',
        'movie_id',
        'position'
    ];
}
