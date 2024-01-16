<?php

namespace App\Domain\Services;

interface AuthenticationServiceInterface
{
    public function register(RegisterRequest $request): void;
    public function login(LoginRequest $request): void;
    public function logout(): void;
    public function getCurrentUser(): ?User;
}
