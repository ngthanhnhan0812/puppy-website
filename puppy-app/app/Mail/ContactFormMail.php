<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;

    public function __construct($data)
    {
        $this->user = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('ntnhan0812a@gmail.com')
            ->markdown('Mail.email-template')
            // ->attachFromStorage($this->user['screenshot'])
            ->with([
                'subject' => $this->user['subject'],
                'message' => $this->user['message'],
                'email' => $this->user['email'],
                'phone_number' => $this->user['phone_number'],
                'fullname' => $this->user['fullname']
            ]);
    }
}
