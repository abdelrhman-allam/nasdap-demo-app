<?php
declare(strict_types=1);

namespace src\Domain\Company\Entity;

use src\Domain\ValueObject\CompanyId;
use src\Domain\ValueObject\CompanyName;
use src\Domain\ValueObject\Logo;
use src\Domain\ValueObject\Description;
use src\Domain\ValueObject\Address;

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

}
