<?php

namespace Tests\Unit\src\Domain\Entities;

use PHPUnit\Framework\TestCase;
use src\Domain\Entities\Company;
use src\Domain\ValueObjects\CompanyId;
use src\Domain\ValueObjects\CompanyName;
use src\Domain\ValueObjects\Logo;
use src\Domain\ValueObjects\Description;
use src\Domain\ValueObjects\Address;

class Company extends TestCase
{

    public function test_to_array(): void
    {

        $company = new Company(
            new CompanyId(1),
            new CompanyName('test'),
            new Logo('test'),
            new Description('test'),
            new Address('test'),
        );

        $this->assertEquals([
            'id' => 1,
            'name' => 'test',
            'logo' => 'test',
            'description' => 'test',
            'address' => 'test',
        ], [
        $company->toArray()]);

    }

    public function test_get_id(): void
    {

        $company = new Company(
            new CompanyId(1),
            new CompanyName('test'),
            new Logo('test'),
            new Description('test'),
            new Address('test'),
        );

        $this->assertEquals(1, $company->getId()->getValue());
    }

    public function test_get_name(): void
    {

        $company = new Company(
            new CompanyId(1),
            new CompanyName('test'),
            new Logo('test'),
            new Description('test'),
            new Address('test'),
        );

        $this->assertEquals('test', $company->getName()->getValue());
    }

    public function test_get_logo(): void
    {

        $company = new Company(
            new CompanyId(1),
            new CompanyName('test'),
            new Logo('test'),
            new Description('test'),
            new Address('test'),
        );

        $this->assertEquals('test', $company->getLogo()->getValue());
    }

    public function test_get_description(): void
    {

        $company = new Company(
            new CompanyId(1),
            new CompanyName('test'),
            new Logo('test'),
            new Description('test'),
            new Address('test'),
        );

        $this->assertEquals('test', $company->getDescription()->getValue());
    }

    public function test_get_address(): void
    {

        $company = new Company(
            new CompanyId(1),
            new CompanyName('test'),
            new Logo('test'),
            new Description('test'),
            new Address('test'),
        );

        $this->assertEquals('test', $company->getAddress()->getValue());
    }




}
