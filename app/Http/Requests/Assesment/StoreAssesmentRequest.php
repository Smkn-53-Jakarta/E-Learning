<?php

namespace App\Http\Requests\Assesment;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssesmentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'submissions' => 'required|array',
            'submissions.*.student_id' => 'required|string',
            'submissions.*.value' => 'nullable|integer',
            'submissions.*.comment' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'submissions.required' => 'Submissions tidak boleh kosong.',
            'submissions.array' => 'Submissions harus berupa array.',
            'submissions.*.value.integer' => 'Value setiap submission harus berupa angka.',
            'submissions.*.comment.string' => 'Comment setiap submission harus berupa string.',
        ];
    }
}
