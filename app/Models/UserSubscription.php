<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSubscription extends Model
{
    protected $fillable = [
        'user_id',
        'subscription_id',
        'start_date',
        'end_date',
        'status',
        'payment_type',
        'payment_status',
        'transaction_number',
        'is_autorenew',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_autorenew' => 'boolean',
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

    public function user()
    {
        return $this->belongsTo(Users::class);
    }
}
