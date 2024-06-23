<?php

namespace App\Http\Requests\Course;

use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCourseRequest extends FormRequest
{
    public function rules(): array
    {
        $tableName = (new Course())->getTable();

        return [
            'name' => ['required', 'string', 'max:64', Rule::unique($tableName, 'name')],
            'kkm' => ['required', 'integer'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama mata pelajaran wajib diisi',
            'name.string' => 'Nama mata pelajaran wajib string',
            'name.max' => 'Nama mata pelajaran maksimal 64 karakter',
            'name.unique' => 'Nama mata pelajaran sudah tersedia',
            'kkm.required' => 'Kkm wajib diisi',
            'kkm.string' => 'Kkm wajib angka',
        ];
    }
}
