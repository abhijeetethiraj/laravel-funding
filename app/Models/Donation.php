<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
protected $fillable = [
    'user_id',
    'campaign_id',
    'donor_name',
    'donor_email',
    'amount',
    'payment_id',
    'payment_response',
    'payment_method',
    'payment_status'
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
