<?php

namespace App\Domains\Signature\Services;

use App\Domains\Signature\DTO\RequestDto;
use App\Domains\Signature\Enums\Status;
use App\Domains\Signature\Models\Signature;
use App\Domains\Signature\Repositories\SignatureRepository;
use App\Domains\Signature\VO\SignatureVo;
use App\Models\User;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

readonly class SignatureService implements SignatureServiceInterface
{
    public function __construct(private SignatureRepository $signatureRepository) {}

    /**
     * @throws \Exception
     */
    public function requestSignature(RequestDto $dto, User $requester): Signature
    {
        if ($this->signatureRepository->signatureExists($dto, $requester)) {
            throw new \Exception('You already requested signature', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return $this->signatureRepository->createRequest($dto, $requester);
    }

    /**
     * @throws \Exception
     */
    public function signDocument(Signature $signature, User $signer): Signature
    {
        if ($signature->status == Status::APPROVED) {
            throw new \Exception('Document already signed', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if (!$this->signatureRepository->isValidSigner($signature, $signer)) {
            throw new \Exception('You cannot sign this document', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return $this->signatureRepository->addSignature($signature, $signer, $this->generateSignature());
    }

    public function generateSignature(): SignatureVo
    {
        return new SignatureVo(Str::uuid()->toString());
    }
}
