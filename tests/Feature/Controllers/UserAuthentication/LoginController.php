<?php

namespace Tests\Feature\Controllers\UserAuthentication;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Http\Controllers\UserAuthentication\LoginController;
use App\Models\User;
use App\Services\UserAuthenticationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery;
class LoginController extends TestCase
{
    use RefreshDatabase; // Use database transactions for tests

    public function test_login_success()
    {
        $user = User::factory()->create(['password' => bcrypt('password')]); // Create a user with password
        $mockAuthenticationService = Mockery::mock(UserAuthenticationService::class);
        $mockAuthenticationService->shouldReceive('login')->once()->with('test@example.com', 'password')->andReturn($user);

        $controller = new LoginController($mockAuthenticationService);
        $response = $controller->__invoke(new Request(['email' => 'test@example.com', 'password' => 'password']));

        $response->assertRedirect('/company');
        $this->assertTrue(Auth::check());
        $this->assertEquals($user->id, Auth::id());
    }

    public function test_login_invalid_credentials()
    {
        $mockAuthenticationService = Mockery::mock(UserAuthenticationService::class);
        $mockAuthenticationService->shouldReceive('login')->once()->andReturn(null);

        $controller = new LoginController($mockAuthenticationService);
        $response = $controller->__invoke(new Request(['email' => 'invalid@email.com', 'password' => 'wrongpassword']));

        $response->assertRedirect('/login');
        $this->assertFalse(Auth::check());
    }
}
