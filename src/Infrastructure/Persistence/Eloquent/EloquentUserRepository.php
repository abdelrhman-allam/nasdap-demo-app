<?php

namespace src\Infrastructure\Persistence\Eloquent;

use src\Domain\Repository\UserRepositoryInterface;
use src\Domain\User\Entity\User;
use App\Models\User as UserModel;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function __construct(private $db)
    {
    }

    public function create(User $user): void
    {
        UserModel::create($user->to_array());
    }

    public function findById(int $id): ?User
    {
        return UserModel::find($id);
    }

    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

}
