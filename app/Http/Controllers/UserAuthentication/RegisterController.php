<?php

namespace App\Http\Controllers\UserAuthentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if($request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ])){
            $this->UserAuthenticationService->register($request);
            return redirect('/login');
        }

        return redirect()->back();
    }
}
