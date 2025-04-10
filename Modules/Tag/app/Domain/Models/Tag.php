<?php

namespace Modules\Tag\Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use JsonSerializable;
use Modules\Post\Domain\Models\Post;

class Tag extends Model implements JsonSerializable
{
    use HasFactory;
    
    /** @var array<string> $fillable */
    protected $fillable = [
        'uuid',
        'name', 
    ];

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(
            Post::class,
            'post_tag',
            'tag_uuid',
            'post_uuid',
            'uuid',
            'uuid'
        );
    }

    /** @return array<string> */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->uuid,
            'name' => $this->name,
            'created_at' => $this->created_at->toIso8601String(),
            'updated_at' => $this->updated_at->toIso8601String(),
        ];
    }
}
