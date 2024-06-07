<?php

namespace App\Http\Requests\Assignment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAssignmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:64'],
            'description' => ['required', 'string'],
            'meeting' => ['required', 'integer', 'digits_between:1,3'],
            'file' => ['nullable', 'mimes:pdf', 'max:10240'],
            'deadline' => ['required'],
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
            'meeting.required' => 'Pertemuan wajib diisi',
            'meeting.integer' => 'Pertemuan wajib angka',
            'meeting.digits_between' => 'Pertemuan maksimal 3 digit',
            'file.mimes' => 'File harus memiliki format pdf',
            'file.max' => 'File maksimal berukuran 10MB.',
            'deadline.required' => 'Deadline wajib diisi'
        ];
    }
}
