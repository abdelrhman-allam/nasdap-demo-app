<?php

namespace src\Domain\ValueObjects;

class Logo
{

    public function __construct(private string $value)
    {
        if (empty($value)) {
            throw new \InvalidArgumentException('Logo cannot be empty');
        }
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
