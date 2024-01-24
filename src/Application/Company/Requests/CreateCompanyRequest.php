<?php

declare(strict_types=1);

namespace src\Application\Company\Requests;

class CreateCompanyRequest
{
    public function __construct(
        public string $name,
        public string $address,
        public string $description,
        public string $logo,
        public string $userId
    ) {
    }


    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['address'],
            $data['description'],
            $data['logo'],
            $data['user_id']
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'address' => $this->address,
            'description' => $this->description,
            'logo' => $this->logo,
            'user_id' => $this->userId
        ];
    }
}
