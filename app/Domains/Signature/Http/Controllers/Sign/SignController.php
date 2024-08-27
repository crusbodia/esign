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

    public function index(Signature $signature, Request $request): SignatureResource
    {
        $signature = $this->signatureService->signDocument($signature, $request->user());

        return new SignatureResource($signature);
    }
}
