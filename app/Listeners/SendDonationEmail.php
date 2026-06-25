<?php

namespace App\Listeners;

use App\Events\DonationReceived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\DonationReceivedMail;
use Illuminate\Support\Facades\Mail;



class SendDonationEmail implements ShouldQueue
{

      use InteractsWithQueue;
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(DonationReceived $event):void
    {
        Mail::to(
            $event->donation->donor_email
        )->send(

            new DonationReceivedMail(

                $event->donation->donor_name,

                $event->donation->amount,

                $event->donation->payment_id
            )
        );
    }
}
