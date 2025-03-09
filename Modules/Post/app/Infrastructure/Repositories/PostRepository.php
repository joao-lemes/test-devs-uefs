<?php

namespace Modules\Post\Infrastructure\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Modules\Post\Domain\Models\Post;
use Modules\Post\Domain\Repositories\PostRepository as IPostRepository;

class PostRepository implements IPostRepository
{
    public function __construct(private readonly Post $model)
    {
    }

    public function list(int $page, int $perPage): LengthAwarePaginator
    {
        return $this->model->with('tags')->paginate(
            $perPage,
            ['uuid', 'body', 'created_at', 'updated_at'],
            'page',
            $page
        );
    }

    public function create(array $attributes): Post
    {
        return $this->model->create($attributes);
    }
}
