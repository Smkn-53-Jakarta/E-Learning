<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:64'],
            'email' => ['required', 'string', 'email', 'max:64', Rule::unique('users', 'email')->ignore($this->user()->id)],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama wajib diisi',
            'name.string' => 'Nama wajib string',
            'name.max' => 'Nama maksimal 64 karakter',
            'email.required' => 'Email wajib diisi',
            'email.string' => 'Email wajib string',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
        ];
    }
}
