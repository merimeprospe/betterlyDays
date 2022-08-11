<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Postulant;
use App\Models\Competence;

class TestMarkdownMail extends Mailable
{
    use Queueable, SerializesModels;
    public $url = '{{route (login)}}';
    public $date = [] ;
    public $message = [];
    /** 
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct(Postulant $user, Array $message)
    {
        $this->date = $user;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.markdown-test');
    }
}
