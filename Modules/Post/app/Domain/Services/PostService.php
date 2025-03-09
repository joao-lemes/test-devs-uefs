<?php

namespace Modules\Post\Domain\Services;

use App\Exceptions\NotFoundException;
use Illuminate\Support\Str;
use Modules\Post\Domain\Repositories\PostRepository;
use Modules\Post\Http\Resources\OutputPost;
use Modules\Post\Http\Resources\OutputPostCollection;
use Modules\Tag\Domain\Services\TagService;

class PostService
{
    public function __construct(
        private readonly PostRepository $postRepository,
        private readonly TagService $tagService
    ) {
    }

    public function list(
        int $page,
        int $perPage
    ): OutputPostCollection {
        $post = $this->postRepository->list($page, $perPage);

        return new OutputPostCollection($post);
    }

    /** @param array<string> $tags */
    public function store(string $body, array $tags): OutputPost
    {
        $post = $this->postRepository->create([
            'body' => $body,
            'uuid' => Str::uuid()->toString(),
        ]);

        $tagsId = [];
        foreach ($tags as $tag) {
            $tagsId[$this->tagService->store($tag)->uuid] = [
                'uuid' => Str::uuid()->toString(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        $post->tags()->sync($tagsId);

        return new OutputPost($post);
    }

    public function getByUuid(string $uuid): OutputPost
    {
        $tag = $this->postRepository->getByUuid($uuid);

        if (empty($tag)) {
            throw new NotFoundException(trans('exception.not_found.post'));
        }

        return new OutputPost($tag);
    }
}
