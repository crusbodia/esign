<?php

namespace App\Domains\Signature\Resources;

use App\Domains\Signature\Models\Signature;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Signature
 *
 * @OA\Schema(
 *     schema="SignatureResource",
 *     type="object",
 *     @OA\Property(
 *         property="uuid",
 *         type="string",
 *     ),
 *     @OA\Property(
 *         property="document_uuid",
 *         type="string",
 *     ),
 *     @OA\Property(
 *         property="signer_id",
 *         type="integer",
 *     ),
 *     @OA\Property(
 *         property="status",
 *         type="integer",
 *     ),
 *     @OA\Property(
 *         property="requested_at",
 *         type="string",
 *         format="date-time",
 *     ),
 *     @OA\Property(
 *         property="signed_at",
 *         type="string",
 *         format="date-time",
 *     ),
 *     @OA\Property(
 *         property="signature",
 *         type="string",
 *     )
 * )
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
