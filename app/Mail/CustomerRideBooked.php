<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomerRideBooked extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $ride;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\App\Ride $ride)
    {
        $this->ride = $ride;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
	return $this->from('ronak@gositer.com')
		->subject('New ride booked')
                ->view('emails.customer_ride_booked');
    }
}
