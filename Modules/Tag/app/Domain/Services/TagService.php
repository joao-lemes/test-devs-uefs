<?php

namespace Modules\Tag\Domain\Services;

use Modules\Tag\Domain\Repositories\TagRepository;
use Modules\Tag\Http\Resources\OutputTagCollection;

class TagService
{
    public function __construct(private readonly TagRepository $userRepository)
    {
    }

    public function list(
        int $page,
        int $perPage
    ): OutputTagCollection {
        $users = $this->userRepository->list($page, $perPage);

        return new OutputTagCollection($users);
    }
}
