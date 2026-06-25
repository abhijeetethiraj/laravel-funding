<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Mail\DonationReceivedMail;
use Illuminate\Support\Facades\Mail;

class DonationController extends Controller
{
    public function store(Request $request)
    {
        $api = new Api(
            env('RAZORPAY_KEY'),
            env('RAZORPAY_SECRET')
        );

        $payment = $api->payment->fetch(
            $request->payment_id
        );

        $paymentData = $payment->toArray();

        $donation = Donation::create([

            'user_id' => Auth::id(),

            'campaign_id' => $request->campaign_id,

            'donor_name' => Auth::check()
                ? Auth::user()->name
                : $request->donor_name,

            'donor_email' => Auth::check()
                ? Auth::user()->email
                : $request->donor_email,

            'amount' => $request->amount,

            'payment_id' => $request->payment_id,

            'payment_response' => json_encode($paymentData),

            'payment_method' => $paymentData['method'],

            'payment_status' => $paymentData['status'],

        ]);
        event(
            new \App\Events\DonationReceived(
                $donation
            )
        );

   

        $campaign = Campaign::findOrFail(
            $request->campaign_id
        );

        $campaign->raised_amount += $request->amount;

        $campaign->donor_count += 1;

        $campaign->save();


        return redirect()->route('campaign.thank');
    }
}
