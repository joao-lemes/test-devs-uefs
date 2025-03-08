<?php

namespace Modules\User\Http\Requests;

use App\Http\Requests\BaseRequest;

class UpdateUserRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    /** @return array<string> */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|max:255|unique:users',
            'current_password' => 'required_with:password|string|min:8',
            'password' => 'sometimes|string|min:8|confirmed',
        ];
    }
}
