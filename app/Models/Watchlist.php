<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Watchlist extends Model
{
    use HasFactory;

    protected $table = 'watchlists';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'movie_id',
        'added_at',
    ];

    protected $casts = [
        'added_at' => 'datetime',
    ];

    /* ======================
       Relationships
    ====================== */

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id');
    }
}
