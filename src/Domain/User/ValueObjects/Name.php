<?php


namespace src\Domain\User\ValueObjects;

class Name
{

    public function __construct(protected string $name)
    {
    }

    public static function fromName(Name $name): Name
    {
        return new Name((string) $name);
    }

    public static function fromString(string $name): Name
    {
        return new Name($name);
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function getValue(): string
    {
        return (string) $this;
    }
}
