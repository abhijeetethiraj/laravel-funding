<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    protected $fillable = [

        'donation_id',

        'refund_id',

        'amount',

        'reason',

        'status',

        'processed_by',

        'notes',

    ];

    public function donation()
    {
        return $this->belongsTo(Donation::class);
    }
}