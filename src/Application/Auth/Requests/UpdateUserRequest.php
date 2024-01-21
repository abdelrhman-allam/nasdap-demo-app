<?php

declare(strict_types=1);

namespace src\Application\Auth\Requests;



class UpdateUserRequest
{
    public function __construct(public string $userId, public string $name, public string $email)
    {
    }

    public function execute(): void
    {
    }
}
