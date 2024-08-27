<?php

namespace App\Domains\Signature\Http\Controllers\Sign;

use App\Domains\Signature\Models\Signature;
use App\Domains\Signature\Resources\SignatureResource;
use App\Domains\Signature\Services\SignatureServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignController extends Controller
{
    public function __construct(
        private readonly SignatureServiceInterface $signatureService
    ) {}

    /**
     * @OA\Patch(
     *     path="/api/signatures/{signature}/sign",
     *     summary="Sign a document",
     *     tags={"Signatures"},
     *     @OA\Parameter(
     *         name="signature",
     *         in="path",
     *         required=true,
     *         description="Signature UUID",
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Signature successfully processed",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(ref="#/components/schemas/SignatureResource"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request",
     *     ),
     *      security={
     *        {"bearerAuth": {}}
     *      }
     * )
     */
    public function index(Signature $signature, Request $request): SignatureResource
    {
        $signature = $this->signatureService->signDocument($signature, $request->user());

        return new SignatureResource($signature);
    }
}
