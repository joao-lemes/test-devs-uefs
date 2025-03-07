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
        'name', 
        'email',
        'password',
    ];
    
    /** @return array<string> */
    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}
