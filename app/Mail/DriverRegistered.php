<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DriverRegistered extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $driver;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\App\Driver $driver)
    {
	$this->driver = $driver;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
	return $this->from('akshayrs1993@gmail.com')
		->subject('Welcome '.$this->driver->f_name)
                ->view('emails.driver_registered');
    }
}
