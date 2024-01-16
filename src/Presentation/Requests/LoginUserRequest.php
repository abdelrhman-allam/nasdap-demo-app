<?php

namespace src\Presentation\Requests;


use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [

            'email' => 'required|email',
            'password' => 'required'

        ];
    }
}
