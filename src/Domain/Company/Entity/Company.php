<?php

declare(strict_types=1);

namespace src\Domain\Company\Entity;

use src\Domain\User\ValueObjects\UserId;
use src\Domain\Company\ValueObjects\Logo;
use src\Domain\Company\ValueObjects\Address;
use src\Domain\Company\ValueObjects\CompanyId;
use src\Domain\Company\ValueObjects\CompanyName;
use src\Domain\Company\ValueObjects\Description;

class Company
{

    public function __construct(
        private CompanyId $id,
        private CompanyName $name,
        private Logo $logo,
        private Description $description,
        private Address $address,
        private UserId $userId
    ) {
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getLogo()
    {
        return $this->logo;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id->getValue(),
            'name' => $this->name->getValue(),
            'logo' => $this->logo->getValue(),
            'description' => $this->description->getValue(),
            'address' => $this->address->getValue(),
            'user_id' => $this->userId->getValue(),
        ];
    }

    public static function fromArray(array $data): self
    {

        return new self(
            new CompanyId($data['id']),
            new CompanyName($data['name']),
            new Logo($data['logo']),
            new Description($data['description']),
            new Address($data['address']),
            new UserId($data['user_id'])
        );
    }
}
