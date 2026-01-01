<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

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

    public function role()
    {
        return $this->belongsTo(CastRole::class,'cast_roles_id');
    }

    protected function profileImageUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? asset('assets/images/'.$value) : null
        );
    }
}
