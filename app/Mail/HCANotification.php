<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HCANotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $rules;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($rules)
    {
        $this->rules = $rules;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('eshanokpe@gmail.com', 'Residential Healthcare and Care home')
        ->subject('Residential Healthcare and Care home')
        ->view('emails.HCANotification')->with([
            'fullname' => $this->rules,
        ]);

       // return $this->markdown('emails.verification-email')->with(['email_token' => $this->rules->email_token, 'fullname' => $this->rules->fullname]);
    }
}
