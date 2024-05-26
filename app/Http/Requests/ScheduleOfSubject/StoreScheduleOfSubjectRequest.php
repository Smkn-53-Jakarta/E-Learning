<?php

namespace App\Http\Requests\ScheduleOfSubject;

use Illuminate\Foundation\Http\FormRequest;

class StoreScheduleOfSubjectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'classroom_id' => ['required', 'string'],
            'teacher_id' => ['required', 'string'],
            'course_id' => ['required', 'string'],
            'day' => ['required', 'string', 'in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu'],
            'start_time' => ['required', 'date_format:H:i'],
            'end_time' => ['required', 'date_format:H:i'],
        ];
    }

    public function messages(): array
    {
        return [
            'classroom_id.required' => 'Kelas wajib diisi.',
            'classroom_id.string' => 'Kelas wajib string',
            'teacher_id.required' => 'Guru mengajar wajib diisi.',
            'teacher_id.string' => 'Guru mengajar wajib string',
            'course_id.required' => 'Mata pelajaran wajib diisi.',
            'course_id.string' => 'Mata pelajaran wajib string',
            'day.required' => 'Hari wajib diisi.',
            'day.string' => 'Hari wajib string',
            'day.in' => 'Hari harus salah satu dari: Senin, Selasa, Rabu, Kamis, Jumat, Sabtu, Minggu.',
            'start_time.required' => 'Waktu mulai wajib diisi.',
            'start_time.date_format' => 'Format waktu mulai harus HH:MM.',
            'end_time.required' => 'Waktu selesai wajib diisi.',
            'end_time.date_format' => 'Format waktu selesai harus HH:MM.',
        ];
    }
}
