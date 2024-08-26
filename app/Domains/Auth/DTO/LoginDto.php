<?php

namespace App\Domains\Auth\DTO;

use App\Domains\Auth\Http\Controllers\Login\LoginRequest;
use Spatie\LaravelData\Data;

class LoginDto extends Data
{
    public function __construct(
        public readonly string $email,
        public readonly string $password,
    ) {}

    public static function fromRequest(LoginRequest $request): LoginDto
    {
        return new self($request->email, $request->password);
    }
}
