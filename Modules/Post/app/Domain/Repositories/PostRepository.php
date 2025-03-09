<?php

namespace Modules\Post\Domain\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Modules\Post\Domain\Models\Post;

interface PostRepository
{
    public function list(int $page, int $perPage): LengthAwarePaginator;
    public function create(array $attributes): Post;
}
