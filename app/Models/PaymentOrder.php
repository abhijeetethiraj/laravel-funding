<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentOrder extends Model
{
      protected $fillable = [
        'order_id',
        'campaign_id',
        'donor_name',
        'donor_email',
        'amount',
    ];
}
