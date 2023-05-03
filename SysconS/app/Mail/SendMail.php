<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // C:\xampp\htdocs\multi_auth\multi_auth\multi_auth\resources\views\pages\contactMail.blade.php
        return $this->from('info@sysconsolution.com')->subject('New Member Add in Syscon LTD')->view('pages.contactMail')->with('data', $this->data);
    }
}
