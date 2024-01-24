<?php

declare(strict_types=1);

namespace src\Domain\User\Repository;

use src\Domain\User\Entity\User;
use src\Domain\User\ValueObjects\UserId;

interface UserRepositoryInterface
{
    public function getNextIdentity(): UserId;
    public function create(User $user): UserId;
    public function findById(UserId $user): ?User;
    public function findByEmail(string $email): ?User;
    public function update(UserId $userId, User $user);
}
