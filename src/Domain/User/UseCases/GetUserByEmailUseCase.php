<?php


class GetUserByEmailUserCase {
    public function __construct(protected UserRepositoryInterFace $repository)
    {

    }

    public function execute(string $email): User
    {
        return $this->findByEmail($email);
    }
}
