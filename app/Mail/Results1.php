<?php

namespace App\Mail;

use App\Http\Controllers\ConectionController;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Results1 extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $conections;

    public function __construct($conections)
    {
        $this->conections = $conections;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $conections = $this->conections;

        return $this->markdown('email.test', compact('conections'));
    }
}
