<?php

namespace src\Domain\User\ValueObjects;

class Email
{
    private $email;

    public function __construct(string $email)
    {
        # validate email
        $this->email = $email;
    }

    public static function fromEmail(Email $email): Email
    {
        return new Email((string) $email);
    }

    public static function fromString(string $email): Email
    {
        return new Email($email);
    }

    public function __toString()
    {
        return $this->email;
    }

    public function getValue(): string
    {
        return (string) $this;
    }
}
