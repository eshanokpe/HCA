<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HCAEmailForgetPassword extends Mailable
{
    use Queueable, SerializesModels;

    protected $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('caredoctor001@gmail.com', 'Residential Healthcare and Carehome')
        ->subject('Residential Healthcare and Carehome Reset Password')
        ->markdown('emails.hcaforgetPassword-email')->with([
            'email_token' => $this->email->token, 
            'email' => $this->email->email,
        ]);
 }
}
