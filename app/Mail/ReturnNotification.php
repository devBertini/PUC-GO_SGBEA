<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReturnNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $loan;
    public $collaborator;

    public function __construct($loan, $collaborator)
    {
        $this->loan = $loan;
        $this->collaborator = $collaborator;
    }

    public function build()
    {
        return $this->subject('Notificação de Devolução')
            ->view('emails.return');
    }
}