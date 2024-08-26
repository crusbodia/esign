<?php

namespace App\Domains\Auth\Http\Controllers\Login;

use App\Domains\Auth\DTO\LoginDto;
use App\Domains\Auth\Services\AuthServiceInterface;
use Illuminate\Routing\Controller;

class LoginController extends Controller
{
    public function __construct(private readonly AuthServiceInterface $authService) {}

    public function index(LoginRequest $request)
    {
        $dto = LoginDto::fromRequest($request);

        return $this->authService->login($dto);
    }
}
