<?php

namespace Modules\Tag\Domain\Services;

use App\Exceptions\NotFoundException;
use Illuminate\Support\Str;
use Modules\Tag\Domain\Repositories\TagRepository;
use Modules\Tag\Http\Resources\OutputTag;
use Modules\Tag\Http\Resources\OutputTagCollection;

class TagService
{
    public function __construct(private readonly TagRepository $tagRepository)
    {
    }

    public function list(
        int $page,
        int $perPage
    ): OutputTagCollection {
        $tag = $this->tagRepository->list($page, $perPage);

        return new OutputTagCollection($tag);
    }

    public function store(string $name): OutputTag
    {
        $tag = $this->tagRepository->create([
            'name' => $name,
            'uuid' => Str::uuid()->toString(),
        ]);

        return new OutputTag($tag);
    }

    public function getByUuid(string $uuid): OutputTag
    {
        $user = $this->tagRepository->getByUuid($uuid);

        if (empty($user)) {
            throw new NotFoundException(trans('exception.not_found.tag'));
        }

        return new OutputTag($user);
    }
}
