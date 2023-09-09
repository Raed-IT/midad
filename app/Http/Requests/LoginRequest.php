<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
 use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "email" => "required|email|exists:users,email",
            "password" => "required|min:8"
        ];
    }


}
