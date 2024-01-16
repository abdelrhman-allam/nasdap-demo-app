<?php

namespace src\Domain\Services;

use Auth;
class AuthenticationService implements AuthenticationServiceInterface
{

    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function register(UserRegisterRequest $request): void
    {
        $user = new User(
            $request->name,
            $request->email,
            password_hash($request->password, PASSWORD_DEFAULT));

        $this->userRepository->create($user);
    }

    public function login(LoginRequest $request): void
    {
        $user = $this->userRepository->findOneByEmail($request->email);

        if (!$user || !password_verify($request->password, $user->password)) {
            throw new Exception('Invalid email or password');
        }

        Auth::login($user);
    }

    public function logout(): void
    {
        Auth::logout();
    }

    public function getCurrentUser(): ?User
    {
        return Auth::user();
    }
}
