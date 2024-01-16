<?php
declare(strict_types=1);

namespace src\Domain\Entities;

use src\Domain\ValueObjects\UserId;
use src\Domain\ValueObjects\Name;
use src\Domain\ValueObjects\Email;
use src\Domain\ValueObjects\Password;



class User{



    public function __construct(private UserId $id,
                                private Name $name,
                                private Email $email,
                                private Password $password)
    {
    }

    public function getId() : UserId

    {
        return $this->id;
    }
    public function getName(): Name
    {
        return $this->name;

    }
    public function getEmail(): Email
    {
        return $this->email;
    }
    public function getPassword(): Password
    {
        return $this->password;
    }


    public function to_array(): array
    {
        return [
            'id' => $this->id->getValue(),
            'name' => $this->name->getValue(),
            'email' => $this->email->getValue(),
            'password' => $this->password->getValue(),
        ];
    }


}
