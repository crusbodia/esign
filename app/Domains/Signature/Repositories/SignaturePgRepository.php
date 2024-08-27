<?php

namespace App\Domains\Signature\Repositories;

use App\Domains\Signature\DTO\RequestDto;
use App\Domains\Signature\Enums\Status;
use App\Domains\Signature\Models\Signature;
use App\Domains\Signature\VO\SignatureVo;
use App\Models\User;
use Illuminate\Support\Carbon;

class SignaturePgRepository implements SignatureRepository
{
    public function createRequest(RequestDto $dto, User $requester): Signature
    {
        return Signature::query()->create([
            'requester_id' => $requester->id,
            'document_uuid' => $dto->document_uuid,
            'signer_id' => $dto->signer_id,
        ]);
    }

    public function signatureExists(RequestDto $dto, User $requester): bool
    {
        return Signature::query()
            ->where('document_uuid', $dto->document_uuid)
            ->where('requester_id', $requester->id)
            ->where('signer_id', $dto->signer_id)
            ->exists();
    }

    public function isValidSigner(Signature $signature, User $signer): bool
    {
        return Signature::query()
            ->where('uuid', $signature->uuid)
            ->where('requester_id', $signer->id)
            ->exists();
    }

    public function addSignature(Signature $signature, User $signer, SignatureVo $signatureVo): Signature
    {
        $signature->update([
            'signed_at' => Carbon::now(),
            'status' => Status::APPROVED,
            'signature' => $signatureVo->getValue(),
        ]);

        return $signature;
    }
}
