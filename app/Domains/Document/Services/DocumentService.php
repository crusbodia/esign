<?php

namespace App\Domains\Document\Services;

use App\Domains\Document\Models\Document;
use App\Domains\Document\Repositories\DocumentRepository;
use App\Domains\Document\VO\FileName;
use App\Models\User;

readonly class DocumentService implements DocumentServiceInterface
{
    public function __construct(private DocumentRepository $documentRepository) {}

    public function createDocument(FileName $fileName, User $user): Document
    {
        return $this->documentRepository->create($fileName, $user);
    }
}
