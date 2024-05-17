<?php

namespace App\Http\Requests\Student;

use App\Models\Student;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreStudentRequest extends FormRequest
{
    public function rules(): array
    {
        $tableName = (new Student())->getTable();

        return [
            'name' => ['required', 'string', 'max:64', Rule::unique($tableName, 'name')],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama siswa wajib diisi',
            'name.string' => 'Nama siswa wajib string',
            'name.max' => 'Nama siswa maksimal 64 karakter',
            'name.unique' => 'Nama siswa sudah tersedia',
        ];
    }
}
