<?php

namespace App\Domains\Document\Repositories;

use App\Domains\Document\Models\Document;
use App\Domains\Document\VO\FileName;
use App\Models\User;

interface DocumentRepository
{
    public function create(FileName $fileName, User $user): Document;
}
