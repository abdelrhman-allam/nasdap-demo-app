<?php

declare(strict_types=1);

namespace src\Application\Auth\Services;

use src\Domain\User\Entity\User;
use src\Domain\User\ValueObjects\Name;
use src\Domain\User\ValueObjects\Email;
use src\Domain\User\ValueObjects\Password;
use src\Domain\User\UseCases\CreateUserUseCase;
use src\Application\Auth\Requests\SignUpUserRequest;
use src\Domain\User\Repository\UserRepositoryInterface;

class SignUpUserService
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private CreateUserUseCase $createUserUseCase
    ) {
    }

    public function execute(SignUpUserRequest $signUpUserRequest)
    {

        $user = new User(
            $this->userRepository->getNextIdentity(),
            new Name($signUpUserRequest->name),
            new Email($signUpUserRequest->email),
            new Password($signUpUserRequest->password)
        );
        $id = $this->createUserUseCase->execute($user);
        return $id;
    }
}
