<?php

namespace Tests\Feature\Controllers\ManageCompany;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Http\Controllers\ManageCompany\ShowCompanyController;
use App\Models\Company;
use App\UseCases\ManageCompany\ShowCompanyUseCase;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Mockery;
use Tests\TestCase;


class ShowCompanyController extends TestCase
{
    use RefreshDatabase;

    public function test_show_company_success(): void
    {

        $company = Company::factory()->create();
        $mockUseCase = Mockery::mock(ShowCompanyUseCase::class);
        $mockUseCase->shouldReceive('execute')->once()->with($company->id)->andReturn($company);

        $controller = new ShowCompanyController($mockUseCase);
        $response = $controller->__invoke(new Request(), $company->id);

        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('manageCompany.show');
        $response->assertViewHas('company', $company);
    }

    public function test_show_company_notFound()
    {
        $mockUseCase = Mockery::mock(ShowCompanyUseCase::class);
        $mockUseCase->shouldReceive('execute')->once()->with(123)->andReturn(null);

        $controller = new ShowCompanyController($mockUseCase);
        $response = $controller->__invoke(new Request(), 123);

        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }

    public function tes_show_company_UseCaseError()
    {
        $mockUseCase = Mockery::mock(ShowCompanyUseCase::class);
        $mockUseCase->shouldReceive('execute')->once()->andThrow(new \Exception('Error fetching company'));

        $controller = new ShowCompanyController($mockUseCase);
        $response = $controller->__invoke(new Request(), 456);

        $response->assertStatus(Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
