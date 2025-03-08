<?php

namespace Modules\Tag\Http\Resources;

use App\Http\Resource\OutputSuccess;

class OutputTagCollection extends OutputSuccess
{
    /** @return array<string> */
    public function getData(): array
    {
        return [
            'tag' => $this->resource->transform(function ($tag) {
                return $tag->jsonSerialize();
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
