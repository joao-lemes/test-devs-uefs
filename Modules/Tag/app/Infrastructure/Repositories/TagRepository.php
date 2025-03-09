<?php

namespace Modules\Tag\Infrastructure\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Modules\Tag\Domain\Models\Tag;
use Modules\Tag\Domain\Repositories\TagRepository as ITagRepository;

class TagRepository implements ITagRepository
{
    public function __construct(private readonly Tag $model)
    {
    }

    public function list(int $page, int $perPage): LengthAwarePaginator
    {
        return $this->model->paginate(
            $perPage,
            ['uuid', 'name', 'created_at', 'updated_at'],
            'page',
            $page
        );
    }

    public function firstOrCreate(array $attributes, array $values): Tag
    {
        return $this->model->firstOrCreate($attributes, $values);
    }

    public function getByUuid(string $uuid): ?Tag
    {
        return $this->model->where('uuid', $uuid)->first();
    }

    public function update(Tag $tag): void
    {
        $this->model->where('uuid', $tag->uuid)->update([
            'name' => $tag->name,
        ]);
    }

    public function delete(Tag $tag): void
    {
        $this->model->where('uuid', $tag->uuid)->delete();
    }
}
