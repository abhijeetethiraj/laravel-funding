<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RefundController;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;


Route::get('/', [CampaignController::class, 'home']);

Route::post(
    '/donation/store',
    [DonationController::class, 'store']
)->name('donation.store');

Route::get('/test-mail', function () {

    Mail::to('abhijeet.ethiraj@impactguru.com')
        ->send(new TestMail());

    return 'Mail Sent!';
});


Route::prefix('campaign')
    ->controller(CampaignController::class)
    ->group(function () {
        Route::get('/{id}/donate', 'showDonate');

        Route::get('/thank',  'thank')->name('campaign.thank');


        Route::get('/failed', 'failed')->name('campaign.failed');

        Route::get('/{id}',  'show')->whereNumber('id');
    });

Route::middleware('guest')
    ->controller(AuthController::class)
    ->group(function () {

        Route::get(
            '/login',
            'showLogin'
        )->name('login');

        Route::post(
            '/login',
            'login'
        );

        Route::get(
            '/signup',
            'showSignup'
        );

        Route::post(
            '/signup',
            'signup'
        );
    });

Route::middleware('auth')->group(function () {

    Route::get('/campaign/create', [CampaignController::class, 'create']);

    Route::post(
        '/logout',
        [AuthController::class, 'logout']
    );

    Route::post('/campaign/store', [CampaignController::class, 'store']);
});

Route::post('/create-order', [DonationController::class, 'createOrder']);

Route::post(
    '/payment/callback',
    [DonationController::class, 'callback']
);

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->controller(AdminController::class)
    ->group(function () {
        Route::get('/dashboard', 'dashboard')
            ->name('admin.dashboard');
        Route::get('/donations', 'donations')
            ->name('admin.donations');

        Route::get(
            '/donations/{id}',
            'showDonation'
        )->name('admin.donations.show');

        Route::get(
            '/campaigns',
            'campaigns'
        )->name('admin.campaigns');

        Route::get(
            '/campaigns/{id}',
            'showCampaign'
        )->name('admin.campaigns.show');

        Route::get(
            '/users',
            'users'
        )->name('admin.users');

        Route::get(
            '/users/{id}',
            'showUser'
        )->name('admin.users.show');
    });

    Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->controller(RefundController::class)
    ->group(function () {

        Route::get(
            '/refund/{donation}',
            'create'
        )->name('admin.refund.create');

        Route::post(
            '/refund',
            'store'
        )->name('admin.refund.store');
    });
