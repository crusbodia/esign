<?php

namespace App\Domains\Auth\Http\Controllers\Login;

use App\Domains\Auth\DTO\LoginDto;
use App\Domains\Auth\Services\AuthServiceInterface;
use Illuminate\Routing\Controller;

class LoginController extends Controller
{
    public function __construct(private readonly AuthServiceInterface $authService) {}

    /**
     * @OA\Post(
     *     path="/api/auth/login",
     *     summary="Login user",
     *     @OA\RequestBody(
     *         description="Login credentials",
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="email",
     *                 description="Email address of the user",
     *                 type="string",
     *             ),
     *             @OA\Property(
     *                 property="password",
     *                 description="Password of the user",
     *                 type="string",
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="token",
     *                 description="Access token",
     *                 type="string",
     *             ),
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request. If the provided credentials are incorrect.",
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable entity. If validation fails.",
     *     ),
     *     tags={"Authentication"}
     * )
     */
    public function index(LoginRequest $request)
    {
        $dto = LoginDto::fromRequest($request);

        return $this->authService->login($dto);
    }
}
