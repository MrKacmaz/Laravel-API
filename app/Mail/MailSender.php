<?php

namespace App\Mail;

use App\Models\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PhpParser\Node\Stmt\Static_;

class MailSender extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    public $currentUserApiKey;



    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, $currentUserApiKey)
    {
        $this->details = $details;
        $this->currentUserApiKey = $currentUserApiKey;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $details = $this->details;
        $currentUserApiKey = $this->currentUserApiKey;

        $allClients = Client::all();
        return $this->subject('KACMAZ CLIENT API SYSTEM')
            ->view('mail', compact('details', 'currentUserApiKey'));
    }
}
