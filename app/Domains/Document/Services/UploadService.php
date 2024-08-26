<?php

namespace App\Domains\Document\Services;

use App\Domains\Document\DTO\UploadDto;
use App\Domains\Document\VO\FileName;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadService implements UploadServiceInterface
{
    const DIRECTORY = 'documents';

    public function uploadPdf(UploadDto $dto): FileName
    {
        $filename = new FileName($this->getUniqueFilename($dto->document));
        $path = $this->getPathForFile($filename);

        Storage::disk('local')->put($path, file_get_contents($dto->document));

        return $filename;
    }

    public function getPathForFile(FileName $filename): string
    {
        return self::DIRECTORY . '/' . $filename->getValue();
    }

    private function getUniqueFilename(UploadedFile $uploadedFile): string
    {
        $uniqueString = Str::uuid()->toString();

        return $uniqueString . '_' . $uploadedFile->getClientOriginalName();
    }
}
