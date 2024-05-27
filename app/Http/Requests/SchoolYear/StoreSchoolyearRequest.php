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
            'year' => ['required', 'string', 'max:64', Rule::unique($tableName, 'year')],
        ];
    }

    public function messages(): array
    {
        return [
            'year.required' => 'Nama tahun pelajaran wajib diisi',
            'year.string' => 'Nama tahun pelajaran wajib string',
            'year.max' => 'Nama tahun pelajaran maksimal 64 karakter',
            'year.unique' => 'Nama tahun pelajaran sudah tersedia',
        ];
    }
}