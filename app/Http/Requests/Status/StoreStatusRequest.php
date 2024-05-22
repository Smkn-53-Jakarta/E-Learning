<?php

namespace App\Http\Requests\Status;

use App\Models\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreStatusRequest extends FormRequest
{
    public function rules(): array
    {
        $tableName = (new Status())->getTable();

        return [
            'name' => ['required', 'string', 'max:64', Rule::unique($tableName, 'name')],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama status wajib diisi',
            'name.string' => 'Nama status wajib string',
            'name.max' => 'Nama status maksimal 64 karakter',
            'name.unique' => 'Nama status sudah tersedia',
        ];
    }
}
