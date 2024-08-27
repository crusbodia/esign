<?php

namespace App\Domains\Signature\Services;

use App\Domains\Signature\DTO\RequestDto;
use App\Domains\Signature\Models\Signature;
use App\Domains\Signature\VO\SignatureVo;
use App\Models\User;

interface SignatureServiceInterface
{
    public function requestSignature(RequestDto $dto, User $requester): Signature;

    public function signDocument(Signature $signature, User $signer): Signature;

    public function generateSignature(): SignatureVo;
}
