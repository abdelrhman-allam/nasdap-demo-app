<?php

namespace src\Domain\Company\ValueObjects;

class CompanyName
{

    public function __construct(private string $value)
    {
        # TODO: Validate
        if (empty($value)) {
            throw new \InvalidArgumentException('Company name cannot be empty');
        }
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
