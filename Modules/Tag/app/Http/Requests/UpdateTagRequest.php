<?php

namespace Modules\Tag\Http\Requests;

use App\Http\Requests\BaseRequest;

class UpdateTagRequest extends BaseRequest
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
            'name' => 'required|string|max:255',
        ];
    }

    /** @return array<string> */
    public function validationData(): array
    {
        return array_merge($this->all(), ['id' => $this->route('id')]);
    }
}
