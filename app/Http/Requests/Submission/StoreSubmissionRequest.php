<?php

namespace App\Http\Requests\Submission;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubmissionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'link_drive' => ['required', 'url:http,https']
        ];
    }

    public function messages(): array
    {
        return [
            'link_drive.required' => 'Link drive wajib diisi.',
            'link_drive.url' => 'Link drive harus berupa URL yang valid dengan skema http atau https.'
        ];
    }
}
