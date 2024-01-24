<?php

namespace Tests\Unit\src\Domain\Entities;

use PHPUnit\Framework\TestCase;

use src\Domain\Company\Entity\Company;
use src\Domain\ValueObjects\Description;
use src\Domain\Company\ValueObjects\Logo;
use src\Domain\Company\ValueObjects\Address;
use src\Domain\Company\ValueObjects\CompanyId;
use src\Domain\Company\ValueObjects\CompanyName;

class TestCompany extends TestCase
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
            $company->toArray()
        ]);
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
