<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactClient extends Mailable
{

    public  $userinfo;


    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userinfo)
    {
        $this->users = $userinfo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */


    public function build()
    {
        $user = $this->users;
        return $this->view('emails.massageToClient' ,compact('user'));
    }
}
