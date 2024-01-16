<?php

namespace Tests\Unit\src\Domain\Services;

use PHPUnit\Framework\TestCase;
use src\Domain\Services\CompanyService;
use src\Domain\Entities\Company;
use src\Domain\Repositories\CompanyRepositoryInterface;
use src\Infrastructure\ExternalAPI\GoogleAPI\FinancialApi;
use Mockery;


class CompanyService extends TestCase
{

   public function test_create_company() : void
   {

    $mockRepository = Mockery::mock(CompanyRepositoryInterface::class);
    $mockRepository->shouldReceive('createCompany')->once()->with(Mockery::type(Company::class))->andReturn(new Company('Test Company'));

    $service = new CompanyService($mockRepository, Mockery::mock(FinancialApiService::class));
    $company = $service->createCompany('Test Name', 'logo.png', 'Description', 'Address');

    $this->assertEquals('Test Company', $company->name);

   }

   public function test_update_company() : void
   {

    $mockRepository = Mockery::mock(CompanyRepositoryInterface::class);
    $mockRepository->shouldReceive('updateCompany')->once()->with(Mockery::type(Company::class))->andReturn(new Company('Test Company'));

    $service = new CompanyService($mockRepository, Mockery::mock(FinancialApiService::class));
    $company = $service->updateCompany(1, 'Test Name', 'logo.png', 'Description', 'Address');

    $this->assertEquals('Test Company', $company->name);
   }


   public function test_delete_company() : void
   {

    $mockRepository = Mockery::mock(CompanyRepositoryInterface::class);
    $mockRepository->shouldReceive('deleteCompany')->once()->with(1);

    $service = new CompanyService($mockRepository, Mockery::mock(FinancialApiService::class));
    $service->deleteCompany(1);
   }

   public function test_get_company_by_id() : void
   {

    $mockRepository = Mockery::mock(CompanyRepositoryInterface::class);
    $mockRepository->shouldReceive('getCompanyById')->once()->with(1)->andReturn(new Company('Test Company'));

    $service = new CompanyService($mockRepository, Mockery::mock(FinancialApiService::class));
    $company = $service->getCompanyById(1);

    $this->assertEquals('Test Company', $company->name);
   }




}
