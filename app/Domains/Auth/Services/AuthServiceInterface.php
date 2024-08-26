<?php

namespace App\Domains\Auth\Services;

use App\Domains\Auth\DTO\LoginDto;

interface AuthServiceInterface
{
    public function login(LoginDto $dto);
}
