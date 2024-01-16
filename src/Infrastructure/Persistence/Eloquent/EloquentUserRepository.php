<?php

namespace src\Infrastructure\Persistence\Eloquent;

use src\Domain\Repository\UserRepositoryInterface;
use src\Domain\User\Entity\User;
use App\Models\User as UserModel;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function __construct(UserModel $user)
    {
        $this->user = $user;

    }

    public function create(User $user): void
    {
        $this->user->name = $user->getName();
        $this->user->email = $user->getEmail();
        $this->user->password = $user->getPassword();
        $this->user->save()
    }

    public function findById(int $id): ?User
    {
        return User::find($id);
    }

    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

}
