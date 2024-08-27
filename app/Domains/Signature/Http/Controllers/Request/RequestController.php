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

    public function index(RequestSignRequest $request): SignatureResource
    {
        $dto = RequestDto::fromRequest($request);
        $signature = $this->signatureService->requestSignature($dto, $request->user());

        return new SignatureResource($signature);
    }
}
