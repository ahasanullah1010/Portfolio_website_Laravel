<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
class ContactMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($contactData)
    {
        $this->contactData = $contactData;
    }



    /**
     * Build the email.
     */
    public function build()
    {
        return $this->from('jkkniumdahasanullah@gmail.com', "Ahasan's Portfolio") // নিজের ইমেইল Sender হিসেবে থাকবে
                    ->replyTo($this->contactData['email'], $this->contactData['name']) // ইউজারের ইমেইল Reply-To হিসেবে থাকবে
                    ->subject('New Contact Message')
                    ->view('emails.contact_message')
                    ->with('contactData', $this->contactData);
    }
}
