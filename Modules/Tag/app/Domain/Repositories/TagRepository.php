<?php

namespace Modules\Tag\Domain\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface TagRepository
{
    public function list(int $page, int $perPage): LengthAwarePaginator;
}
