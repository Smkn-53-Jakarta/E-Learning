<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:32'],
            'email' => ['required', 'string', 'email', 'max:64', Rule::unique('users', 'email')->ignore($this->user()->id)],
        ];
    }
}
