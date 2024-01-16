<?php

namespace Tests\Feature\Controllers\UserAuthentication;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Http\Controllers\UserAuthentication\RegisterController;
use App\Services\UserAuthenticationService;
use Illuminate\Http\Request;
use Mockery;


class RegisterController extends TestCase
{
    use RefreshDatabase;

    public function test_register_success()
    {
        $mockAuthenticationService = Mockery::mock(UserAuthenticationService::class);
        $mockAuthenticationService->shouldReceive('register')->once();

        $controller = new RegisterController($mockAuthenticationService);
        $response = $controller->__invoke(new Request([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'P@s22w0rD!?',
            'password_confirmation' => 'P@s22w0rD!?',
        ]));

        $response->assertRedirect('/login');
        $this->assertDatabaseHas('users', ['email' => 'test@example.com']);
    }

    public function test_register_validationFailed()
    {
        $controller = new RegisterController(Mockery::mock(UserAuthenticationService::class));
        $response = $controller->__invoke(new Request([
            'name' => '',
            'email' => 'invalid_email',
            'password' => 'short',
        ]));

        $response->assertRedirect('/register');
        $response->assertSessionHasErrors(['name', 'email', 'password']);
    }
}
