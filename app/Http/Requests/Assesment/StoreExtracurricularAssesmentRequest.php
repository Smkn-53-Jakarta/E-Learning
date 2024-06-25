<?php

namespace App\Http\Requests\Assesment;

use Illuminate\Foundation\Http\FormRequest;

class StoreExtracurricularAssesmentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'assesments' => 'required|array',
            'assesments.*.student_id' => 'required|string',
            'assesments.*.value' => 'nullable|integer',
        ];
    }

    public function messages()
    {
        return [
            'assesments.required' => 'Penilaian tidak boleh kosong.',
            'assesments.array' => 'Penilaian harus berupa array.',
            'assesments.*.value.integer' => 'Nilai setiap penilaian harus berupa angka.',
        ];
    }
}
