<?php

namespace App\Http\Requests\Extracurricular;

use App\Models\Extracurricular;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateExtracurricularRequest extends FormRequest
{
    public function rules(): array
    {
        $tableName = (new Extracurricular())->getTable();
        $extracurricularId = $this->route('extracurricular')->id;

        return [
            'name' => ['required', 'string', 'max:64', Rule::unique($tableName, 'name')->ignore($extracurricularId)],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama ekstrakurikuler wajib diisi',
            'name.string' => 'Nama ekstrakurikuler wajib string',
            'name.max' => 'Nama ekstrakurikuler maksimal 64 karakter',
            'name.unique' => 'Nama ekstrakurikuler sudah tersedia',
        ];
    }
}
