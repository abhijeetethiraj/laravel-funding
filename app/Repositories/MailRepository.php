<?php
namespace App\Repositories;

use App\Mail\HighestDonorMail;
use App\Models\Donation;
use Illuminate\Support\Facades\Mail;

class MailRepository
{
    public function sendHighestDonorMail()
    {
        $highestDonor = Donation::select(
            'donor_name',
            'donor_email'
        )
        ->selectRaw('SUM(amount) as total_amount ')
        ->groupBy(
            'donor_name',
            'donor_email'
        )
        ->orderByDesc('total_amount')
        ->first();
        if(!$highestDonor){
            return;
        }

        Mail::to($highestDonor->donor_email)
        ->send(
            new HighestDonorMail($highestDonor)
        );
        
    }
}