<?php

namespace App\Http\Requests\Material;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMaterialRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:64'],
            'description' => ['required', 'string'],
            'file' => ['nullable', 'mimes:pdf', 'max:10240'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul materi wajib diisi',
            'title.string' => 'Judul materi wajib string',
            'title.max' => 'Judul materi maksimal 64 karakter',
            'description.required' => 'Deskripsi wajib diisi',
            'description.string' => 'Deskripsi wajib string',
            'file.mimes' => 'File harus memiliki format pdf',
            'file.max' => 'File maksimal berukuran 10MB.',
        ];
    }
}
