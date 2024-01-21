<?php

declare(strict_types=1);

namespace src\Domain\User\Entity;

use src\Domain\User\ValueObjects\UserId;
use src\Domain\User\ValueObjects\Name;
use src\Domain\User\ValueObjects\Email;
use src\Domain\User\ValueObjects\Password;



class User
{

    public function __construct(
        private UserId $id,
        private Name $name,
        private Email $email,
        private Password $password
    ) {
    }

    public function getId(): UserId
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

    public static function fromArray(array $user): User
    {
        return new self(
            new UserId($user['userId']),
            new Name($user['name']),
            new Email($user['email']),
            new Password($user['password'])
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id->getValue(),
            'name' => $this->name->getValue(),
            'email' => $this->email->getValue(),
            'password' => $this->password->getValue(),
        ];
    }
}
