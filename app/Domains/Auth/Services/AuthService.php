<?php

namespace App\Domains\Auth\Services;

use App\Domains\Auth\DTO\LoginDto;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class AuthService implements AuthServiceInterface
{
    public function login(LoginDto $dto)
    {
        /** @var User $user */
        $user = User::where('email', $dto->email)->first();

        if (! $user || ! Hash::check($dto->password, $user->password)) {
            throw new BadRequestHttpException('The provided credentials are incorrect.');
        }

        return $user->createToken('token')->plainTextToken;
    }
}
