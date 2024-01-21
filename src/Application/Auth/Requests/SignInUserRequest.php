<?php

declare(strict_types=1);


namespace src\Application\Auth\Requests;

class SignInUserRequest
{
    public function __construct(public string $email, public string $password)
    {
    }

    public static function fromArray(array $array): SignInUserRequest
    {
        return new self(
            $array['email'],
            $array['password']
        );
    }
}
