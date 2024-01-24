<?php

namespace Tests\Unit\src\Domain\Entities;

use PHPUnit\Framework\TestCase;
use src\Domain\User\Entity\User;
use src\Domain\User\ValueObjects\Name;
use src\Domain\User\ValueObjects\Email;
use src\Domain\User\ValueObjects\Password;
use src\Domain\User\ValueObjects\UserId;

class TestUser extends TestCase
{

    public function test_to_array(): void
    {

        $user = new User(
            new UserId(1),
            new Name('test'),
            new Email('test'),
            new Password('test'),
        );

        $this->assertEquals([
            'id' => 1,
            'name' => 'test',
            'email' => 'test',
            'password' => 'test',
        ], [
            $user->toArray()
        ]);
    }

    public function test_get_id(): void
    {

        $user = new User(
            new UserId(1),
            new Name('test'),
            new Email('test'),
            new Password('test'),
        );

        $this->assertEquals(1, $user->getId()->getValue());
    }

    public function test_get_name(): void
    {

        $user = new User(
            new UserId(1),
            new Name('test'),
            new Email('test'),
            new Password('test'),
        );

        $this->assertEquals('test', $user->getName()->getValue());
    }

    public function test_get_email(): void
    {

        $user = new User(
            new UserId(1),
            new Name('test'),
            new Email('test'),
            new Password('test'),
        );

        $this->assertEquals('test', $user->getEmail()->getValue());
    }

    public function test_get_password(): void
    {

        $user = new User(
            new UserId(1),
            new Name('test'),
            new Email('test'),
            new Password('test'),
        );

        $this->assertEquals('test', $user->getPassword()->getValue());
    }
}
