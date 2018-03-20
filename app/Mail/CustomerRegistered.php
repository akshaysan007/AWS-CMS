<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomerRegistered extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;  
    public $customer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\App\Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
	return $this->from('ronak@gositer.com')
		->subject('Welcome '.$this->customer->f_name)
                ->view('emails.customer_registered');
    }
}
