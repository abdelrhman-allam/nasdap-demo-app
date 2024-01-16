<?php

namespace src\Domain\Repository;

use src\Domain\User\Entity\User;

interface UserRepositoryInterface
{
    public function create(User $user): void;
    public function findByEmail(string $email): ?User;
}
