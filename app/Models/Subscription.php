<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'plan_name',
        'price',
        'duration_days',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];
}
