<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Message;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }



    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        // dd($this->name);
        // $message = $this->message; // Assuming $this->message is already a string
        // return $this
        //     ->subject('Send Mail')
        //     ->view('backend.pages.mailSetting.mail', compact('message'));

        if($this->data['type'] == 'fogot password'){

            return $this->subject($this->data['subject'])->view('backend.pages.mailSetting.mailForgotPassword');            
        }

        return $this->subject($this->data['subject'])->view('backend.pages.mailSetting.mail');
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope();
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content();
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
