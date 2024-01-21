<?php


namespace src\Domain\User\ValueObjects;

class UserId
{

    public function __construct(protected string $id)
    {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public static function fromString(string $id): UserId
    {
        return new UserId($id);
    }

    public function __toString()
    {
        return (string)$this->id;
    }

    public function getValue(): string
    {
        return (string) $this;
    }
}
