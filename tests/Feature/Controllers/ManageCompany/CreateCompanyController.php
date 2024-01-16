<?php

namespace Tests\Feature\Controllers\ManageCompany;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Http\Controllers\ManageCompany\CreateCompanyController;


class CreateCompanyController extends TestCase
{
    use RefreshDatabase;

    public function test_create_company_success()
    {
        $mockUseCase = Mockery::mock(CreateCompanyUseCase::class);
        $mockUseCase->shouldReceive('execute')->once()->withArgs(function (CreateCompanyRequest $request) {
            return $request->name === 'Test Company' &&
                   $request->logo === 'logo.png' &&
                   $request->description === 'Description' &&
                   $request->address === 'Address';
        })->andReturn(new Company());

        $controller = new CreateCompanyController($mockUseCase);
        $response = $controller->__invoke(new Request([
            'name' => 'Test Company',
            'logo' => 'logo.png',
            'description' => 'Description',
            'address' => 'Address',
        ]));

        $response->assertRedirect('manageCompany.index');
        $this->assertDatabaseHas('companies', ['name' => 'Test Company']);
    }

    public function test_vreate_vompany_validation_failed()
    {
        $mockUseCase = Mockery::mock(CreateCompanyUseCase::class);
        $controller = new CreateCompanyController($mockUseCase);
        $response = $controller->__invoke(new Request([
            'name' => '',
            'logo' => 'invalid_logo',
            'description' => 'too long description',
            'address' => '',
        ]));

        $response->assertRedirect('manageCompany.create');
        $response->assertSessionHasErrors(['name', 'logo', 'description', 'address']);
    }
}
