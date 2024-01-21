<?php

declare(strict_types=1);

namespace src\Application\Auth\Requests;


class SignUpUserRequest
{
    public function __construct(public string $name, public string $email, public string $password)
    {
    }


    public static function fromArray(array $array): SignUpUserRequest
    {
        return new self(
            $array['name'],
            $array['email'],
            $array['password'],
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ];
    }
}
