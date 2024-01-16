<?php

namespace src\Presentation\Controllers\Auth;

use App\Http\Controllers\Controller;
use src\Http\Requests\RegisterUserRequest;
use src\Application\Services\UserAuthenticationServiceInterface;

class RegisterUserController extends Controller
{

    public function __construct(UserAuthenticationServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function __invoke(RegisterUserRequest $request)
    {

        if (!$request->validated()) {
            return response()->json(['errors' => $request->errors()], 422);
        }

        // it can create a command in the future $RegisterUserCommand

        $this->userService->register($request);
    }
}

