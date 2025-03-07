<?php

namespace Modules\User\Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use JsonSerializable;

class User extends Model implements JsonSerializable
{
    use HasFactory;
    
    /** @var array<string> $fillable */
    protected $fillable = [
        'uuid',
        'name', 
        'email',
        'password',
    ];
    
    /** @return array<string> */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->uuid,
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->created_at->toIso8601String(),
            'updated_at' => $this->updated_at->toIso8601String(),
        ];
    }
}
