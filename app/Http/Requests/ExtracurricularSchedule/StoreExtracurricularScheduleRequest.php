<?php

namespace App\Http\Requests\ExtracurricularSchedule;

use Illuminate\Foundation\Http\FormRequest;

class StoreExtracurricularScheduleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'extracurricular_id' => ['required', 'string'],
            'user_id' => ['required', 'string'],
            'day' => ['required', 'string', 'in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu'],
            'members' => ['required', 'array'],
            'start_time' => ['required', 'date_format:H:i'],
            'end_time' => ['required', 'date_format:H:i'],
        ];
    }

    public function messages(): array
    {
        return [
            'extracurricular_id.required' => 'Kelas wajib diisi.',
            'extracurricular_id.string' => 'Kelas wajib string',
            'user_id.required' => 'Guru mengajar wajib diisi.',
            'user_id.string' => 'Guru mengajar wajib string',
            'day.required' => 'Hari wajib diisi.',
            'day.string' => 'Hari wajib string',
            'members.required' => 'Anggota ekstrakurikuler wajib diisi.',
            'members.array' => 'Anggota ekstrakurikuler wajib string',
            'day.required' => 'Hari wajib diisi',
            'day.in' => 'Hari harus salah satu dari: Senin, Selasa, Rabu, Kamis, Jumat, Sabtu, Minggu.',
            'start_time.required' => 'Waktu mulai wajib diisi.',
            'start_time.date_format' => 'Format waktu mulai harus HH:MM.',
            'end_time.required' => 'Waktu selesai wajib diisi.',
            'end_time.date_format' => 'Format waktu selesai harus HH:MM.',
        ];
    }
}
