<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class OttProvider extends Model
{
    protected $table = 'ott_providers';

    protected $fillable = [
        'name',
        'logo_url',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    protected function logoUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? asset('assets/images/' . $value) : null,

            // ONLY store filename
            set: fn ($value) => $value 
        );
    }
}
