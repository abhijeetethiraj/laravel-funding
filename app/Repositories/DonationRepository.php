<?php

namespace App\Repositories;

use Razorpay\Api\Errors\SignatureVerificationError;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Interfaces\DonationRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Campaign;
use Illuminate\Support\Facades\Auth;

use Razorpay\Api\Api;

class DonationRepository implements DonationRepositoryInterface
{
    public function store(Request $request)
    {    
        

        $request->validate([
            'campaign_id' => 'required|exists:campaigns,id',
            'payment_id'  => 'required|string',
            'order_id'    => 'required|string',
            'signature'   => 'required|string',
        ]);

        Log::debug("Store Method Started");

        try {
            $api = new Api(
                env('RAZORPAY_KEY'),
                env('RAZORPAY_SECRET')
            );

            $api->utility->verifyPaymentSignature([
                'razorpay_order_id'   => $request->order_id,
                'razorpay_payment_id' => $request->payment_id,
                'razorpay_signature'  => $request->signature,
            ]);

            $order = $api->order->fetch(
                $request->order_id
            );

            $amount = $order->amount / 100;

            if ($request->amount != $amount) {
                abort(400, 'Amount mismatch.');
            }

            $payment = $api->payment->fetch(
                $request->payment_id
            );

            $paymentData = $payment->toArray();

            if (Donation::where(
                'payment_id',
                $request->payment_id
            )->exists()) {
                abort(409, 'payment already processed');
            }

            DB::transaction(function () use (
                $request,
                $paymentData,
                $amount
            ) {
                $donation = Donation::create([

                    'user_id' => Auth::id(),

                    'campaign_id' => $request->campaign_id,

                    'donor_name' => Auth::check()
                        ? Auth::user()->name
                        : $request->donor_name,

                    'donor_email' => Auth::check()
                        ? Auth::user()->email
                        : $request->donor_email,

                    'amount' => $amount,

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

                $campaign->increment(
                    'raised_amount',
                    $amount
                );

                $campaign->increment(
                    'donor_count'
                );

                $campaign->save();
            });
        } catch (SignatureVerificationError $e) {
            Log::warning('Signature verfication failed', [
                'payment_id' => $request->payment_id,
                'message' => $e->getMessage(),
            ]);

            return redirect()
                ->route('campaign.failed');
        } catch (Exception $e) {
            Log::error('Donation failed', [
                'message' => $e->getMessage(),
            ]);
            return redirect()
                ->route('campaign.failed');
        }
    }
}
