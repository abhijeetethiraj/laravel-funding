<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class HighestDonorMail extends Mailable
{
    use Queueable, SerializesModels;

    public $highestDonor;

    public function __construct($highestDonor)
    {
        $this->highestDonor = $highestDonor;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thank You for Your Generous Support',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.highest-donor',
        );
    }
}