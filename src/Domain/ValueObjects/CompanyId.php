<?php

namespace src\Domain\ValueObjects;

use src\Domain\Shared\ValueObjects\Uuid;

class CompanyId extends Uuid
{
    public function __construct(string $value)
    {
        parent::__construct($value);
    }

    public static function generate(): self
    {
        return new self(Uuid::generate());
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

    public function isSame(self $other): bool
    {
        return $this->equals($other);
    }

    public function isDifferent(self $other): bool
    {
        return !$this->equals($other);
    }

    public function isNew(): bool
    {
        return $this->value === Uuid::generate();
    }

    public function isNotNew(): bool
    {
        return !$this->isNew();
    }

    public function isInvalid(): bool
    {
        return !$this->isValid();
    }
}
