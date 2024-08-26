<?php

namespace App\Domains\Document\Services;

use App\Domains\Document\DTO\UploadDto;
use App\Domains\Document\VO\FileName;

interface UploadServiceInterface
{
    public function uploadPdf(UploadDto $dto): FileName;

    public function getPathForFile(FileName $filename): string;
}
