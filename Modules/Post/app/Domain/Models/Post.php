<?php

namespace Modules\Post\Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use JsonSerializable;
use Modules\Tag\Domain\Models\Tag;

class Post extends Model implements JsonSerializable
{
    use HasFactory;
    
    /** @var array<string> $fillable */
    protected $fillable = [
        'uuid',
        'body', 
    ];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(
            Tag::class,
            'post_tag',
            'post_uuid',
            'tag_uuid',
            'uuid',
            'uuid'
        );
    }

    /** @return array<string> */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->uuid,
            'body' => $this->body,
            'tags' => $this->tags->map(fn($tag) => $tag->jsonSerialize()),
            'created_at' => $this->created_at->toIso8601String(),
            'updated_at' => $this->updated_at->toIso8601String(),
        ];
    }
}
