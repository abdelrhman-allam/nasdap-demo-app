<?php

namespace App\Http\Controllers\UserAuthentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        if($user = $this->UserAuthenticationService->login($request->email, $request->password)){
            Auth::login($user);
            return redirect('/company');
        }

        return redirect('/login');

    }
}
