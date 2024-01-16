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
            Hash::make($request->password));

        $this->userRepository->create($user);
    }

    public function login(LoginRequest $request): void
    {
        $user = $this->userRepository->findOneByEmail($request->email);

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw new Exception('Invalid email or password');
        }

        return $user
    }

    public function logout(): void
    {

    }
}
