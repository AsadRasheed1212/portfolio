<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $formData;

    public function __construct(array $formData)
    {
        $this->formData = $formData;
    }

    public function build()
    {
        return $this->subject('New Portfolio Contact: ' . ($this->formData['subject'] ?: 'No subject'))
            ->view('emails.contact')
            ->with('data', $this->formData);
    }
}