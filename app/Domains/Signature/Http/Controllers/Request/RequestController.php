<?php

namespace App\Domains\Signature\Http\Controllers\Request;

use App\Domains\Signature\DTO\RequestDto;
use App\Domains\Signature\Resources\SignatureResource;
use App\Domains\Signature\Services\SignatureServiceInterface;
use App\Http\Controllers\Controller;

class RequestController extends Controller
{
    public function __construct(
        private readonly SignatureServiceInterface $signatureService
    ) {}

    /**
     * @OA\Post(
     *      path="/api/signatures/request",
     *      operationId="requestSignature",
     *      tags={"Signature"},
     *      summary="Request document signature",
     *      description="Returns signature requesting data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="document_uuid",
     *                  type="string",
     *                  description="The UUID of the document to be signed",
     *              ),
     *              @OA\Property(
     *                  property="signer_id",
     *                  type="integer",
     *                  description="The ID of the user who will sign the document",
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="uuid",
     *                  type="string",
     *                  description="The UUID of the signature request",
     *              ),
     *              @OA\Property(
     *                  property="document_uuid",
     *                  type="string",
     *                  description="The UUID of the document to be signed",
     *              ),
     *              @OA\Property(
     *                  property="signer_id",
     *                  type="integer",
     *                  description="The ID of the user who will sign the document",
     *              ),
     *              @OA\Property(
     *                  property="status",
     *                  type="string",
     *                  description="The status of the signature",
     *              ),
     *              @OA\Property(
     *                  property="requested_at",
     *                  type="string",
     *                  format="date-time",
     *                  description="The datetime when the signature was requested",
     *              ),
     *              @OA\Property(
     *                  property="signed_at",
     *                  type="string",
     *                  format="date-time",
     *                  description="The datetime when the signature was made",
     *              ),
     *              @OA\Property(
     *                  property="signature",
     *                  type="string",
     *                  description="The actual signature",
     *              ),
     *          ),
     *       ),
     *       security={
     *        {"bearerAuth": {}}
     *      }
     * )
     */
    public function index(RequestSignRequest $request): SignatureResource
    {
        $dto = RequestDto::fromRequest($request);
        $signature = $this->signatureService->requestSignature($dto, $request->user());

        return new SignatureResource($signature);
    }
}
