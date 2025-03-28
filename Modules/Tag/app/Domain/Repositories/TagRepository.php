<?php

namespace Modules\Tag\Domain\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Modules\Tag\Domain\Models\Tag;

interface TagRepository
{
    public function list(int $page, int $perPage): LengthAwarePaginator;
    public function firstOrCreate(array $attributes, array $values): Tag;
    public function getByUuid(string $uuid): ?Tag;
    public function update(Tag $tag): void;
    public function delete(Tag $tag): void;
}
