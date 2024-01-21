<?php

namespace src\Infrastructure\Persistence\Connection;

use Ramsey\Uuid\Uuid;
use src\Domain\User\Entity\User;
use src\Domain\User\ValueObjects\UserId;
use Illuminate\Database\ConnectionInterface;
use src\Domain\User\Repository\UserRepositoryInterface;

class DbConnectionUserRepository implements UserRepositoryInterface
{
    private $table;

    public function __construct(private ConnectionInterface $connection)
    {
        $this->table =  $this->connection->table('users');
    }


    public function getNextIdentity(): UserId
    {
        return UserId::fromString(Uuid::uuid4()->toString());
    }

    public function create(User $user): UserId
    {
        $this->table->insert([
            'id' => "{$user->getId()}",
            'name' => "{$user->getName()}",
            'email' => "{$user->getEmail()}",
            'password' => "{$user->getPassword()}"
        ]);

        #$id = $this->connection->pdo->lastInsertId();
        return UserId::fromString($user->getId());
    }

    public function findById(UserId $id): ?User
    {
        return $this->table->where('id', $id)->first();
    }

    public function findByEmail(string $email): ?User
    {
        $user = $this->table->where('email', $email)->first()->toArray();
        return $user ?? $this->makeUser($user);
    }

    public function update(UserId $id, User $user)
    {
        $this->table->where('id', $id->getValue())->update(
            $user->toArray()
        );
    }

    private function makeUser($user): ?User
    {
        return User::fromArray($user);
    }
}
