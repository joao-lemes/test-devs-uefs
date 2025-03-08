<?php

namespace Modules\Tag\Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use JsonSerializable;

class Tag extends Model implements JsonSerializable
{
    use HasFactory;
    
    /** @var array<string> $fillable */
    protected $fillable = [
        'uuid',
        'name', 
    ];

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
