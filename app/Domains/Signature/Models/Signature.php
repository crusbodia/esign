<?php

namespace App\Domains\Signature\Models;

use App\Domains\Document\Models\Document;
use App\Domains\Signature\Enums\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property string $uuid
 * @property int $requester_id
 * @property string $document_uuid
 * @property int $signer_id
 * @property int $status
 * @property Carbon|null $requested_at
 * @property Carbon|null $signed_at
 * @property string $signature
 *
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 *
 * @property-read User $requester
 * @property-read User $signer
 * @property-read Document $document
 */
class Signature extends Model
{
    use HasUuids;

    protected $primaryKey = 'uuid';

    protected $fillable = [
        'requester_id',
        'document_uuid',
        'signer_id',
        'status',
        'requested_at',
        'signed_at',
        'signature',
    ];

    protected $casts = [
        'status' => Status::class,
    ];

    public function requester(): BelongsTo
    {
        return $this->belongsTo(User::class, 'requester_id', 'id');
    }

    public function signer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'requester_id', 'id');
    }

    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class, 'document_uuid', 'uuid');
    }
}
