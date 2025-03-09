<?php

namespace Modules\Post\Http\Resources;

use App\Http\Resource\OutputSuccess;

class OutputPost extends OutputSuccess
{
    /** @return array<string> */
    public function getData(): array
    {
        return [
            'post' => $this->resource->jsonSerialize(),
        ];
    }
}
