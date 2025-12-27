<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

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

    public function getLogoUrlAttribute($value)
    {
        if (!$value) {
            return null;
        }

        return asset('assets/images/' . $value);
    }

    public function setLogoUrlAttribute($value)
    {
        // CASE 1: direct string
        if (is_string($value)) {
            $this->attributes['logo_url'] = $value;
            return;
        }

        // CASE 2: File upload
        if ($value instanceof UploadedFile) {
            $filename = uniqid('ott_') . '.' . $value->getClientOriginalExtension();
            $value->move(public_path('assets/images'), $filename);

            $this->attributes['logo_url'] = $filename;
        }
    }
}
