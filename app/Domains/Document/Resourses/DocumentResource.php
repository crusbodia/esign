<?php

namespace App\Domains\Document\Resourses;

use App\Domains\Document\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(schema="DocumentResource", ref="#/components/schemas/DocumentResource")
 * @mixin Document
 */
class DocumentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @OA\Property(property="uuid", type="string")
     * @OA\Property(property="filename", type="string")
     * @OA\Property(property="owner_id", type="integer")
     *
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'uuid' => $this->uuid,
            'filename' => $this->filename,
            'owner_id' => $this->owner_id,
        ];
    }
}
