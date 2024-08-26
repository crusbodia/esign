<?php

namespace App\Domains\Auth\Http\Controllers\Login;

use App\Domains\Common\Http\Requests\ApiRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

/**
 * @property-read string $email
 * @property-read string $password
 */
class LoginRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'max:255'],
        ];
    }

    public function failedValidation(Validator $validator): void
    {
        $response = response()->json([
            'errors' => ['fields' => $validator->errors()->toArray()]
        ], Response::HTTP_UNPROCESSABLE_ENTITY);

        throw new ValidationException($validator, $response);
    }
}
