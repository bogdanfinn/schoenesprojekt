<?php

namespace App\Services;

use App\DataTransferObject\Enquiry;

class MailerService
{
    private $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendContactMail(Enquiry $enquiry): void
    {
        $message = (new \Swift_Message('Kontaktformular'))
            ->setFrom('seminar@bogdanfinn.de')
            ->setTo('bogdan.finn@googlemail.com')
            ->setReplyTo($enquiry->getEmail())
            ->setBody($this->createEmailBody($enquiry));

        $this->mailer->send($message);
    }

    private function createEmailBody(Enquiry $enquiry): string
    {
        $name = $enquiry->getName();
        $email = $enquiry->getEmail();
        $subject = $enquiry->getSubject();
        $body = $enquiry->getBody();

        return "Eine Kontaktanfrage wurde erstellt von $name.
                
                E-Mail Adresse: $email
                Betreff: $subject
              
                Nachricht:
                $body";
    }
}