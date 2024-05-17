<?php

namespace App\Http\Requests\Teacher;

use App\Models\Teacher;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTeacherRequest extends FormRequest
{
    public function rules(): array
    {
        $tableName = (new Teacher())->getTable();
        $teacherId = $this->route('teacher')->id;

        return [
            'name' => ['required', 'string', 'max:64', Rule::unique($tableName, 'name')->ignore($teacherId)],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama guru wajib diisi',
            'name.string' => 'Nama guru wajib string',
            'name.max' => 'Nama guru maksimal 64 karakter',
            'name.unique' => 'Nama guru sudah tersedia',
        ];
    }
}
