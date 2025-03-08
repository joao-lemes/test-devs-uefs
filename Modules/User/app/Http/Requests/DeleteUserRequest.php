<?php

namespace Modules\User\Http\Requests;

use App\Http\Requests\BaseRequest;

class DeleteUserRequest extends BaseRequest
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
            'current_password' => 'required|string|min:8',
        ];
    }

    /** @return array<string> */
    public function validationData(): array
    {
        return array_merge($this->all(), ['id' => $this->route('id')]);
    }
}
