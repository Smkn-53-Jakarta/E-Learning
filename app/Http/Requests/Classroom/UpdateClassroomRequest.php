<?php

namespace App\Http\Requests\Classroom;

use App\Models\Classroom;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClassroomRequest extends FormRequest
{
    public function rules(): array
    {
        $tableName = (new Classroom())->getTable();
        $classroomId = $this->route('classroom')->id;

        return [
            'name' => ['required', 'string', 'max:64', Rule::unique($tableName, 'name')->ignore($classroomId)],
            'homeroom_teacher' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama kelas wajib diisi',
            'name.string' => 'Nama kelas wajib string',
            'name.max' => 'Nama kelas maksimal 64 karakter',
            'name.unique' => 'Nama kelas sudah tersedia',
            'homeroom_teacher.required' => 'Wali kelas wajib diisi',
            'homeroom_teacher.string' => 'Wali kelas wajib string',
        ];
    }
}
