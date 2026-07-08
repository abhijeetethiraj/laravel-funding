<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Api;
use App\Models\PaymentOrder;
use App\Repositories\DonationRepository;
use Illuminate\Http\Request;


class DonationController extends Controller
{
    protected $donationRepository;

    public function __construct(
        DonationRepository $donationRepository
    ) {
        $this->donationRepository = $donationRepository;
    }


    public function store(Request $request)
    {

        $this->donationRepository->store($request);
        return redirect()->route('campaign.thank');
    }

    public function callback(Request $request)
    {
        $paymentOrder = PaymentOrder::where(
            'order_id',
            $request->razorpay_order_id
        )->first();

        $request->merge([
            'campaign_id' => $paymentOrder->campaign_id,
            'donor_name'  => $paymentOrder->donor_name,
            'donor_email' => $paymentOrder->donor_email,
            'amount'      => $paymentOrder->amount,
            'payment_id'  => $request->razorpay_payment_id,
            'order_id'    => $request->razorpay_order_id,
            'signature'   => $request->razorpay_signature,
        ]);

        $this->donationRepository->store($request);

        return redirect()->route('campaign.thank');
    }


    public function  createOrder(Request $request)
    {
       
        try {


            $api = new Api(
                env('RAZORPAY_KEY'),
                env('RAZORPAY_SECRET')
            );

            $order = $api->order->create([
                'receipt' => 'donation_' . time() .'_' . rand(1000, 9999),
                'amount' => $request->amount * 100,
                'currency' => 'INR',
            ]);
            
            
            PaymentOrder::create([
                'order_id' => $order['id'],
                'campaign_id' => $request->campaign_id,

                'donor_name' => Auth::check()
                    ? Auth::user()->name
                    : $request->donor_name,

                'donor_email' => Auth::check()
                    ? Auth::user()->email
                    : $request->donor_email,

                'amount' => $request->amount,
            ]);

            return response()->json($order->toArray());
        } catch (\Exception $e) {

            dd(
                $e->getMessage(),
                $e->getFile(),
                $e->getLine()
            );
        }
    }
}
