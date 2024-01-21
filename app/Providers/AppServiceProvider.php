<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use src\Domain\User\Repository\UserRepositoryInterface;
use src\Infrastructure\Persistence\Connection\DbConnectionUserRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(UserRepositoryInterface::class, DbConnectionUserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
