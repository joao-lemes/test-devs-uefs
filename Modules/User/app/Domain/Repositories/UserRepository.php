<?php

namespace Modules\User\Domain\Repositories;

use Modules\User\Domain\Models\User;

interface UserRepository
{
    public function create(array $attributes): User;
}
