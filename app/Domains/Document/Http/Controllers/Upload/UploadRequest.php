<?php

namespace App\Domains\Document\Http\Controllers\Upload;

use App\Domains\Common\Http\Requests\ApiRequest;
use Illuminate\Http\UploadedFile;

/**
 * @property-read UploadedFile $document
 */
class UploadRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'document' => ['required', 'mimes:pdf', 'max:2048'],
        ];
    }
}
