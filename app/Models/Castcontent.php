<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Castcontent extends Model
{
    protected $table = 'castcontent';

    protected $fillable = [
        'movie_id',
        'cast_id',
        'cast_roles_id',
    ];

    public function movie(){
        return $this->belongsTo(Movie::class);
    }

    public function cast(){
        return $this->belongsTo(Cast::class);
    }

    public function role(){
        return $this->belongsTo(Castrole::class,'cast_roles_id');
    }

}
