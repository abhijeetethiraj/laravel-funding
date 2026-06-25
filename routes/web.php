<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;


Route::get('/', [CampaignController::class, 'home']);


Route::get('/campaign/create', [CampaignController::class, 'create']);

Route::get('/campaign/thank', [CampaignController::class, 'thank'])
    ->name('campaign.thank');

Route::get(
    '/campaign/{id}/donate',
    [CampaignController::class, 'showDonate']
);

Route::get('/campaign/{id}', [CampaignController::class, 'show'])
    ->whereNumber('id');

Route::post('/campaign/store', [CampaignController::class, 'store']);

Route::post(
    '/donation/store',
    [DonationController::class, 'store']
)->name('donation.store');

Route::get(
    '/login',
    [AuthController::class, 'showLogin']
)->name('login');

Route::post(
    '/login',
    [AuthController::class, 'login']
);

Route::get(
    '/signup',
    [AuthController::class, 'showSignup']
);

Route::post(
    '/signup',
    [AuthController::class, 'signup']
);

Route::post(
    '/logout',
    [AuthController::class, 'logout']
);

Route::get('/test-mail', function () {

    Mail::to('abhijeet.ethiraj@impactguru.com')
        ->send(new TestMail());

    return 'Mail Sent!';
});


Route::get('/campaign/failed', [CampaignController::class, 'failed'])
    ->name('campaign.failed');
