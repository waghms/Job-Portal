<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use SerializesModels;

    public $validatedData;

    /**
     * Create a new message instance.
     *
     * @param array $validatedData
     * @return void
     */
    public function __construct($validatedData)
    {
        $this->validatedData = $validatedData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Contact Form Submission')
                    ->to(config('mail.contact_form_email'))  // Email from config
                    ->view('emails.contactform') // Specify the view for the email
                    ->with('data', $this->validatedData); // Pass validated data to the view
    }
}
