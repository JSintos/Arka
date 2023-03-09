<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;

class OrganizationalRegistrationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $username;
    public $password;
    public $emailAddress;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $emailAddress, string $username, string $password)
    {
        $this->emailAddress = $emailAddress;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    // public function envelope()
    // {
    //     return new Envelope(
    //         from: new Address('arka@example.com', 'Arka'),
    //         subject: 'Arka credentials',
    //     );
    // }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('regmail')->with(array('emailAddress' => $this->emailAddress, 'username'=> $this->username, 'password' => $this->password));
    }

    // public function content()
    // {
    //     return new Content(
    //         view: 'regmail',
    //         with: ['username' => $this->username, 'password' => $this->password],
    //     );
    // }
}
