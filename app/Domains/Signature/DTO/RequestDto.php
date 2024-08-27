<?php

namespace App\Domains\Signature\DTO;

use App\Domains\Signature\Http\Controllers\Request\RequestSignRequest;
use Spatie\LaravelData\Data;

class RequestDto extends Data
{
    public function __construct(
        public readonly string $document_uuid,
        public readonly int $signer_id,
    ) {}

    public static function fromRequest(RequestSignRequest $request): RequestDto
    {
        return new self(
            $request->document_uuid,
            $request->signer_id,
        );
    }
}
