<?php

namespace App\Providers;

use App\Events\DonationReceived;
use App\Listeners\SendDonationEmail;
use App\Models\Donation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    
    protected $listen =[
        DonationReceived::class =>[
            SendDonationEmail::class,
        ],
    ] ;       


    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
