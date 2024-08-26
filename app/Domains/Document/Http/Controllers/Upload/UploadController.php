<?php

namespace App\Domains\Document\Http\Controllers\Upload;

use App\Domains\Document\DTO\UploadDto;
use App\Domains\Document\Resourses\DocumentResource;
use App\Domains\Document\Services\DocumentServiceInterface;
use App\Domains\Document\Services\UploadServiceInterface;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    public function __construct(
        private readonly UploadServiceInterface $uploadService,
        private readonly DocumentServiceInterface $documentService,
    ) {}

    public function index(UploadRequest $request): DocumentResource
    {
        $file = $this->uploadService->uploadPdf(UploadDto::fromRequest($request));
        $document = $this->documentService->createDocument($file, $request->user());

        return new DocumentResource($document);
    }
}
