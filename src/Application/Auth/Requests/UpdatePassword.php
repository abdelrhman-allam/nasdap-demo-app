<?php

declare(strict_types=1);

namespace src\Application\Auth\Requests;


class UpdatePasswordRequest
{

    public function __construct(public string $userId, public string $password)
    {
    }
}
