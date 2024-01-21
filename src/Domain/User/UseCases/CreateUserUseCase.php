<?php

namespace src\Domain\User\UseCases;

use src\Domain\User\Entity\User;
use src\Domain\User\Repository\UserRepositoryInterface;

class CreateUserUseCase
{
    public function __construct(protected UserRepositoryInterface $repository)
    {
    }

    public function execute(User $user)
    {
        return $this->repository->create($user);
    }
}
