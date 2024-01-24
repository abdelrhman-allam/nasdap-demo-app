<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use src\Domain\User\Repository\UserRepositoryInterface;
use src\Domain\Company\Repository\CompanyRepositoryInterface;
use src\Infrastructure\Persistence\Connection\DbConnectionUserRepository;
use src\Infrastructure\Persistence\Connection\DbConnectionCompanyRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(UserRepositoryInterface::class, DbConnectionUserRepository::class);
        $this->app->bind(CompanyRepositoryInterface::class, DbConnectionCompanyRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
