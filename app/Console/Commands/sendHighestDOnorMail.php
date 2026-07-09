<?php

namespace App\Console\Commands;

use App\Repositories\MailRepository;
use Illuminate\Console\Command;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Attributes\Description;

#[Signature('app:send-highest-donor-mail')]
#[Description('Send mail to highest donor')]
class SendHighestDonorMail extends Command
{
    protected $mailRepository;

    public function __construct(
        MailRepository $mailRepository
    ) {
        parent::__construct();

        $this->mailRepository = $mailRepository;
    }

    public function handle()
    {
        $this->mailRepository->sendHighestDonorMail();

        $this->info('Highest donor mail sent.');
    }
}