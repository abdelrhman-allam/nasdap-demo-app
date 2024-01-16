<?php

namespace Tests\Unit\src\Domain\Entities;

use PHPUnit\Framework\TestCase;
use src\Domain\Entities\User;
use src\Domain\ValueObjects\UserId;

class User extends TestCase
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
            $user->toArray()]);
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
