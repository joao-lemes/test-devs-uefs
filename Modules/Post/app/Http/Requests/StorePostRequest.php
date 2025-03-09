<?php

namespace Modules\Post\Http\Requests;

use App\Http\Requests\BaseRequest;

class StorePostRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    /** @return array<string> */
    public function rules(): array
    {
        return [
            'body' => 'required|string|max:255',
            'tags' => 'sometimes|array',
            'tags.*' => 'string|max:255|unique:tags,name',
        ];
    }
}
