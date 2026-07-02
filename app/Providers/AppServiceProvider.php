<?php

namespace App\Providers;

use App\Events\DonationReceived;
use App\Listeners\SendDonationEmail;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\DonationRepositoryInterface;
use App\Interfaces\CampaignRepositoryInterface;
use App\Repositories\DonationRepository;
use App\Repositories\CampaignRepository;


class AppServiceProvider extends ServiceProvider
{
    
    protected $listen =[
        DonationReceived::class =>[
            SendDonationEmail::class,
        ],
    ] ;       

    public function register(): void
    {
        $this->app->bind(
            DonationRepositoryInterface::class,
            DonationRepository::class
        );
        
        $this->app->bind(
            CampaignRepositoryInterface::class,
            CampaignRepository::class
        );

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
