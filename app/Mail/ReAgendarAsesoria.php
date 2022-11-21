<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReAgendarAsesoria extends Mailable
{
    use Queueable, SerializesModels;
    public $info;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->info = $data;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()

    
    {
        return $this->subject('Asesoría personalizada EADIC - Reprogramada')->view('mails.cita_succes_rescheduled');
    }
}
