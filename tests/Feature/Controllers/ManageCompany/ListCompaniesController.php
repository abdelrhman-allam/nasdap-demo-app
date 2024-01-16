<?php

namespace Tests\Feature\Controllers\ManageCompany;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Http\Controllers\ManageCompany\ListCompaniesController;
use App\Models\Company;
use App\UseCases\Company\ListCompanyUseCase;

use Illuminate\Http\Request;
use Mockery;
class ListCompaniesController extends TestCase
{
    use RefreshDatabase;

    public function test_list_companies_success()
    {
        Company::factory()->create(['name' => 'Company A']);
        Company::factory()->create(['name' => 'Company B']);

        $mockUseCase = Mockery::mock(ListCompanyUseCase::class);
        $mockUseCase->shouldReceive('execute')->once()->andReturn(Company::all());

        $controller = new ListCompaniesController($mockUseCase);
        $response = $controller->__invoke(new Request());

        $response->assertStatus(200);
        $response->assertViewIs('manageCompany.listCompanies');
        $response->assertViewHas('companies', function ($companies) {
            return count($companies) === 2 &&
                   $companies->contains('name', 'Company A') &&
                   $companies->contains('name', 'Company B');
        });
    }
}
