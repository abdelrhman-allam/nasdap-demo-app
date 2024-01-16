<?php


namespace src\Domain\ValueObjects;

class Password
{

    public function __construct(public string $password)
    {
        $this->password = $password;
    }

    public function __toString(): string
    {
        return $this->password;
    }

}
