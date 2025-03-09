<?php

namespace Modules\Post\Http\Resources;

use App\Http\Resource\OutputSuccess;

class OutputPostCollection extends OutputSuccess
{
    /** @return array<string> */
    public function getData(): array
    {
        return [
            'posts' => $this->resource->transform(function ($post) {
                return $post->jsonSerialize();
            }),
            'meta' => [
                'current_page' => $this->currentPage(),
                'per_page' => $this->perPage(),
                'total' => $this->total(),
                'last_page' => $this->lastPage(),
            ],
        ];
    }
}
