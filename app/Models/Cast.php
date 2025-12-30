<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Cast extends Model
{
    protected $table = 'cast';

    public $timestamps = false; 

    protected $fillable = [
        'name',
        'profile_image_url',
        'bio',
        'date_of_birth',
    ];

    protected function profileImageUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value) =>
                $value ? asset('assets/images/' . $value) : null
        );
    }
}
