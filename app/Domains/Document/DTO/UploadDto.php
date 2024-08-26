<?php

namespace App\Domains\Document\DTO;

use App\Domains\Document\Http\Controllers\Upload\UploadRequest;
use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Data;

class UploadDto extends Data
{
    public function __construct(public readonly UploadedFile $document) {}

    public static function fromRequest(UploadRequest $request): UploadDto
    {
        return new self($request->document);
    }
}
