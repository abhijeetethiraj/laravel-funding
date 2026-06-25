<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    public function images()
{
    return $this->hasMany(CampaignImage::class);
}

public function donations()
{
    return $this->hasMany(Donation::class);
}

protected $fillable = [
    'title',
    'story',
    'target_amount',
    'raised_amount',
    'campaigner_name',
    'campaigner_city',
    'beneficiary_name',
    'beneficiary_relation',
    'hospital_name'
];
}
