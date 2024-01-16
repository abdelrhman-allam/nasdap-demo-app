<?php


namespace src\Domain\ValueObjects;

class Name {

    public function __construct(public string $name)
    {
        $this->name = $name;
    }

    public function __toString(): string
    {
        return $this->name;
    }

}
