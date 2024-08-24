<?php

namespace App\Http\Requests\TeacherAttendance;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherAttendanceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'status' => ['required', 'string', 'in:Hadir,Tidak Hadir'],
            'information' => ['nullable', 'string', 'max:255'],
            'substitute_teacher' => ['nullable', 'string', 'max:64', 'required_if:status,Tidak Hadir'],
        ];
    }

    public function messages(): array
    {
        return [
            'status.required' => 'Status wajib diisi.',
            'status.string' => 'Status harus berupa teks.',
            'status.in' => 'Status harus salah satu dari: Hadir atau Tidak Hadir.',
            'information.string' => 'Informasi harus berupa teks.',
            'information.max' => 'Informasi tidak boleh lebih dari 255 karakter.',
            'substitute_teacher.string' => 'Guru pengganti harus berupa teks.',
            'substitute_teacher.max' => 'Guru pengganti tidak boleh lebih dari 64 karakter.',
            'substitute_teacher.required_if' => 'Guru pengganti wajib diisi jika statusnya adalah Tidak Hadir.',
        ];
    }
}
