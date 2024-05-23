<?php

namespace App\Http\Requests\Teacher;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTeacherRequest extends FormRequest
{
    public function rules(): array
    {
        $teacherTable = (new Teacher())->getTable();
        $userTable = (new User())->getTable();
        $teacher = $this->route('teacher');
        $teacherId = $teacher->id;

        return [
            'profile_picture' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:10240'],
            'name' => ['required', 'string', 'max:64'],
            'status_id' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:64', Rule::unique($userTable, 'email')->ignore($teacher->user_id)],
            'identification_number' => ['required', 'string', Rule::unique($teacherTable, 'identification_number')->ignore($teacherId)],
        ];
    }

    public function messages(): array
    {
        return [
            'profile_picture.image' => 'Foto harus berupa file gambar.',
            'profile_picture.mimes' => 'Foto harus memiliki format jpg, png, atau jpeg.',
            'profile_picture.max' => 'Foto maksimal berukuran 10MB.',
            'name.required' => 'Nama wajib diisi',
            'name.string' => 'Nama wajib string',
            'name.max' => 'Nama maksimal 64 karakter',
            'status_id.required' => 'Status wajib diisi',
            'status_id.string' => 'Status wajib string',
            'email.required' => 'Email wajib diisi',
            'email.string' => 'Email wajib string',
            'email.email' => 'Email tidak valid',
            'email.max' => 'Email maksimal 64 karakter',
            'email.unique' => 'Email sudah terdaftar',
            'identification_number.required' => 'NIP wajib diisi',
            'identification_number.string' => 'NIP wajib string',
            'identification_number.unique' => 'NIP sudah terdaftar',
        ];
    }
}
