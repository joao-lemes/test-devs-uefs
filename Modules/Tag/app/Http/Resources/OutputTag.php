<?php

namespace Modules\Tag\Http\Resources;

use App\Http\Resource\OutputSuccess;

class OutputTag extends OutputSuccess
{
    /** @return array<string> */
    public function getData(): array
    {
        return [
            'tag' => $this->resource->jsonSerialize(),
        ];
    }
}
