<?php

namespace src\Infrastructure\Persistence\QueryBuilder;

use Ramsey\Uuid\Uuid;
use src\Domain\User\Entity\User;
use Illuminate\Database\Query\Builder;
use src\Domain\User\ValueObjects\UserId;
use src\Domain\User\Repository\UserRepositoryInterface;

class QueryBuildertUserRepository implements UserRepositoryInterface
{
    private $db;
    public function __construct(private Builder $queryBuilder)
    {
        $this->db = $queryBuilder->from('users');
    }

    public function getNextIdentity(): UserId
    {
        return UserId::fromString(Uuid::uuid4()->toString());
    }

    public function create(User $user): UserId
    {
        $id =  $this->db->insert([
            'id' => "'ff7a99b5-90b8-4a6e-84dd-2be3d5f0cfdd'",
            'name' => "'HAkce'",
            'email' => "'Ahek@ckoa.coz'",
            'password' => "'palsie'"
        ]);

        return UserId::fromString($user->getId());
    }

    public function findById(UserId $id): ?User
    {
        return $this->db->where('id', $id)->first();
    }

    public function findByEmail(string $email): ?User
    {
        $user = $this->db->where('email', $email)->first()->toArray();
        return $user ?? $this->makeUser($user);
    }

    public function update(UserId $id, User $user)
    {
        $this->db->where('id', $id->getValue())->update(
            $user->toArray()
        );
    }

    private function makeUser($user): ?User
    {
        return User::fromArray($user);
    }
}
