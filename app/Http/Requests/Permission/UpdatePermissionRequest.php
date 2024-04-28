<?php

namespace App\Http\Requests\Permission;

use App\Rules\UniquePermissionName;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePermissionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'accesses' => ['required', 'array', 'min:1', new UniquePermissionName]
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama permission wajib diisi',
            'name.string' => 'Nama permission wajib string',
            'name.unique' => 'Nama permission sudah digunakan',
            'accesses.required' => 'Setidaknya pilih salah satu diantara (read, create, update, delete, restore, export)',
            'accesses.array' => 'Permissions wajib bernilai array',
        ];
    }
}
