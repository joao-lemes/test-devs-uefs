<?php

namespace Modules\Post\Http\Requests;

use App\Http\Requests\BaseRequest;

class UpdatePostRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    /** @return array<string> */
    public function rules(): array
    {
        return [
            'id' => 'required|uuid',
            'body' => 'required|string|max:255',
            'tags' => 'sometimes|array',
            'tags.*' => 'string|max:255',
        ];
    }

    /** @return array<string> */
    public function validationData(): array
    {
        return array_merge($this->all(), ['id' => $this->route('id')]);
    }
}
