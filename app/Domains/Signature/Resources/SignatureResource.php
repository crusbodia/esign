<?php

namespace App\Domains\Signature\Resources;

use App\Domains\Signature\Models\Signature;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Signature
 */
class SignatureResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'uuid' => $this->uuid,
            'document_uuid' => $this->document_uuid,
            'signer_id' => $this->signer_id,
            'status' => $this->status,
            'requested_at' => $this->requested_at,
            'signed_at' => $this->signed_at,
            'signature' => $this->signature,
        ];
    }
}
