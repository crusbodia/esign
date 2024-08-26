<?php

namespace App\Domains\Document\Repositories;

use App\Domains\Document\Models\Document;
use App\Domains\Document\VO\FileName;
use App\Models\User;

class DocumentPgRepository implements DocumentRepository
{
    public function create(FileName $fileName, User $user): Document
    {
        return Document::query()->create([
            'filename' => $fileName->getValue(),
            'owner_id' => $user->id
        ]);
    }
}
