<?php

namespace Modules\Post\Domain\Services;

use Modules\Post\Domain\Repositories\PostRepository;
use Modules\Post\Http\Resources\OutputPostCollection;

class PostService
{
    public function __construct(private readonly PostRepository $postRepository)
    {
    }

    public function list(
        int $page,
        int $perPage
    ): OutputPostCollection {
        $post = $this->postRepository->list($page, $perPage);

        return new OutputPostCollection($post);
    }
}
