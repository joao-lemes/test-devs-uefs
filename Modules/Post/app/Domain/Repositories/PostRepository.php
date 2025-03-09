<?php

namespace Modules\Post\Domain\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface PostRepository
{
    public function list(int $page, int $perPage): LengthAwarePaginator;
}
