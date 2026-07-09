<?php

namespace App\Console\Commands;

use App\Models\Donation;
use App\Models\Refund;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;


#[Signature('app:calculate-funds')]
#[Description('Command description')]
class CalculateFunds extends Command
{
   protected $signature =   'calculate:funds';
   protected $description = 'calculate avaliable funds';
    public function handle():int
    {
        $totalDonations = Donation::sum('amount');
          $totalRefunds = Refund::sum('amount');

    $availableFunds = $totalDonations - $totalRefunds;

    $this->info("Total Donations : ₹{$totalDonations}");

    $this->info("Total Refunds : ₹{$totalRefunds}");

    $this->info("Available Funds : ₹{$availableFunds}");

    return self::SUCCESS;

    }
}
