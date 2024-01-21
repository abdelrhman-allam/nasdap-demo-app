<?php
declare(strict_types=1);

namespace src\Domain\Entities;

use src\Domain\ValueObjects\CompanyId;
use src\Domain\ValueObjects\CompanyName;
use src\Domain\ValueObjects\Logo;
use src\Domain\ValueObjects\Description;
use src\Domain\ValueObjects\Address;

class Company {

    public function __construct(
        private CompanyId $id,
        private CompanyName $name,
        private Logo $logo,
        private Description $description,
        private Address $address)
    {
        $this->id = $id;
        $this->name = $name;
        $this->logo = $logo;
        $this->description = $description;
        $this->address = $address;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getLogo(){
        return $this->logo;
    }

    public function getDescription(){
        return $this->description;
    }

    public function to_array(){
        return [
            'id' => $this->id->getValue(),
            'name' => $this->name->getValue(),
            'logo' => $this->logo->getValue(),
            'description' => $this->description->getValue(),
            'address' => $this->address->getValue(),
        ];
    }



}
