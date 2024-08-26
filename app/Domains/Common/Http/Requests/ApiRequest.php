<?php

namespace App\Domains\Common\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class ApiRequest extends FormRequest
{
    public function failedValidation(Validator $validator): void
    {
        $response = response()->json([
            'errors' => ['fields' => $validator->errors()->toArray()]
        ], Response::HTTP_UNPROCESSABLE_ENTITY);

        throw new ValidationException($validator, $response);
    }
}
