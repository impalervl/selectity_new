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
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $conections = new ConectionController;

        $conections = $conections->index();

        $conections = $conections->conections;

        return $this->markdown('email.test', compact('conections'));
    }
}
