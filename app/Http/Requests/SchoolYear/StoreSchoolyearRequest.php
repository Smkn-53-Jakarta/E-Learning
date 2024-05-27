<?php

namespace App\Http\Requests\SchoolYear;

use App\Models\SchoolYear;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSchoolyearRequest extends FormRequest
{
    public function rules(): array
    {
        $tableName = (new SchoolYear())->getTable();

        return [
            'name' => ['required', 'string', 'max:64', Rule::unique($tableName, 'name')],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama tahun pelajaran wajib diisi',
            'name.string' => 'Nama tahun pelajaran wajib string',
            'name.max' => 'Nama tahun pelajaran maksimal 64 karakter',
            'name.unique' => 'Nama tahun pelajaran sudah tersedia',
        ];
    }
}