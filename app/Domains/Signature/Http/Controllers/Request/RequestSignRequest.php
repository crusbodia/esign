<?php

namespace App\Domains\Signature\Http\Controllers\Request;

use App\Domains\Common\Http\Requests\ApiRequest;

/**
 * @property-read string $document_uuid
 * @property-read int $signer_id
 */
class RequestSignRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'document_uuid' => ['required', 'uuid', 'exists:documents,uuid'],
            'signer_id' => ['required', 'int', 'exists:users,id'],
        ];
    }
}
