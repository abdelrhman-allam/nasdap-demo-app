<?php


namespace src\Domain\ValueObjects;

class UserId
{
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function __toString()
    {
        return (string)$this->id;
    }
}
