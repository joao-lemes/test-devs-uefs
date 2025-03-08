<?php

namespace Modules\Tag\Http\Requests;

use App\Http\Requests\BaseRequest;

class StoreTagRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    /** @return array<string> */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:tags,name',
        ];
    }
}
