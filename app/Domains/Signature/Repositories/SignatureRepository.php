<?php

namespace App\Domains\Signature\Repositories;

use App\Domains\Signature\DTO\RequestDto;
use App\Domains\Signature\Models\Signature;
use App\Domains\Signature\VO\SignatureVo;
use App\Models\User;

interface SignatureRepository
{
    public function createRequest(RequestDto $dto, User $requester): Signature;

    public function signatureExists(RequestDto $dto, User $requester): bool;

    public function isValidSigner(Signature $signature, User $signer): bool;

    public function addSignature(Signature $signature, User $signer, SignatureVo $signatureVo): Signature;
}
