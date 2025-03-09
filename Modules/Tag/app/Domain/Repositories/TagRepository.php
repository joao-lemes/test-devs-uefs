<?php

namespace Modules\Tag\Domain\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Modules\Tag\Domain\Models\Tag;

interface TagRepository
{
    public function list(int $page, int $perPage): LengthAwarePaginator;
    public function create(array $attributes): Tag;
    public function getByUuid(string $uuid): ?Tag;
}
