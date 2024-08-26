<?php

namespace App\Domains\Document\Services;

use App\Domains\Document\Models\Document;
use App\Domains\Document\VO\FileName;
use App\Models\User;

interface DocumentServiceInterface
{
    public function createDocument(FileName $fileName, User $user): Document;
}
