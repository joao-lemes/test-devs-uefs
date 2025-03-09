<?php

namespace Modules\Post\Domain\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Modules\Post\Domain\Models\Post;

interface PostRepository
{
    public function list(int $page, int $perPage): LengthAwarePaginator;
    public function create(array $attributes): Post;
    public function getByUuid(string $uuid): ?Post;
    public function update(Post $post): void;
    public function delete(Post $post): void;
}
