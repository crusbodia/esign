<?php

namespace App\Domains\Document\Resourses;

use App\Domains\Document\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Document
 */
class DocumentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'uuid' => $this->uuid,
            'filename' => $this->filename,
            'owner_id' => $this->owner_id,
        ];
    }
}
