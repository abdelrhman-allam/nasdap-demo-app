<?php

namespace src\Domain\Company\ValueObjects;

class Description
{
    private $description;

    public function __construct(string $description)
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function __toString()
    {
        return $this->description;
    }

    public function getValue(): string
    {
        return $this->description;
    }
}
