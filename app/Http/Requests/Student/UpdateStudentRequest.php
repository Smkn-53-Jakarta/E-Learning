<?php

namespace App\Http\Requests\Student;

use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends FormRequest
{
    public function rules(): array
    {
        $userTable = (new User())->getTable();
        $studentTable = (new Student())->getTable();
        $student = $this->route('student');
        $studentId = $student->id;

        return [
            'profile_picture' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:10240'],
            'name' => ['required', 'string', 'max:64'],
            'status_id' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:64', Rule::unique($userTable, 'email')->ignore($student->user_id)],
            'classroom_id' => ['required', 'string'],
            'school_year_id' => ['required', 'string'],
            'identification_number' => ['required', 'string', Rule::unique($studentTable, 'identification_number')->ignore($studentId)],
        ];
    }

    public function messages(): array
    {
        return [
            'profile_picture.image' => 'Foto harus berupa file gambar.',
            'profile_picture.mimes' => 'Foto harus memiliki format jpg, png, atau jpeg.',
            'profile_picture.max' => 'Foto maksimal berukuran 10MB.',
            'name.required' => 'Nama murid wajib diisi',
            'name.string' => 'Nama murid wajib string',
            'name.max' => 'Nama murid maksimal 64 karakter',
            'status_id.required' => 'Status wajib diisi',
            'status_id.string' => 'Status wajib string',
            'email.required' => 'Email wajib diisi',
            'email.string' => 'Email wajib string',
            'email.email' => 'Email tidak valid',
            'email.max' => 'Email maksimal 64 karakter',
            'email.unique' => 'Email sudah terdaftar',
            'classroom_id.required' => 'Kelas wajib diisi',
            'classroom_id.string' => 'Kelas wajib string',
            'school_year_id.required' => 'Tahun pelajaran wajib diisi',
            'school_year_id.string' => 'Tahun pelajaran wajib string',
            'identification_number.required' => 'NIP wajib diisi',
            'identification_number.string' => 'NIP wajib string',
            'identification_number.unique' => 'NIP sudah terdaftar',
        ];
    }
}
