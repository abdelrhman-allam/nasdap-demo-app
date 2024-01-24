<?php


namespace src\Domain\User\ValueObjects;

class Password
{

    public function __construct(protected string $password)
    {
    }

    public static function fromPassword(Password $password): Password
    {
        return new Password((string) $password);
    }

    public static function fromString(string $password): Password
    {
        return new Password($password);
    }

    public function __toString(): string
    {
        return $this->password;
    }

    public function getValue(): string
    {
        return $this->password;
    }
}
