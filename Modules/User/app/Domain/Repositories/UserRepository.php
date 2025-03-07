<?php

namespace Modules\User\Domain\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Modules\User\Domain\Models\User;

interface UserRepository
{
    public function list(int $page, int $perPage): LengthAwarePaginator;
    public function create(array $attributes): User;
}
