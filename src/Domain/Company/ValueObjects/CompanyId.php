<?php

namespace src\Domain\Company\ValueObjects;


class CompanyId
{

    public function __construct(protected string $value)
    {
    }

    public static function fromString(string $value): self
    {
        return new self($value);
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function equals(self $other): bool
    {
        return $this->value === $other->value;
    }


    public function getValue(): string
    {
        return $this->value;
    }
}
