<?php

namespace App\DataTransferObject;

use Symfony\Component\Validator\Constraints as Assert;

class Enquiry
{
    /**
     * @Assert\NotBlank(message="Gib bitte einen Namen ein.")
     *
     * @var string|null
     */
    protected $name;

    /**
     * @Assert\Email(message="Gib bitte eine gültige E-Mail Adresse ein.")
     *
     * @var string|null
     */
    protected $email;

    /**
     * @Assert\NotBlank(message="Gib bitte ein Betreff ein.")
     * @Assert\Length(max ="70", maxMessage="Der Betreff sollte nicht länger als 70 Zeichen sein.")
     *
     * @var string|null
     */
    protected $subject;

    /**
     * @Assert\Length(min="10", minMessage="Die Nachricht sollte mindestens 10 Zeichen enthalten.")
     *
     * @var string|null
     */
    protected $body;

    /**
     * @return null|string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param null|string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return null|string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param null|string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return null|string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param null|string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return null|string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param null|string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }
}
