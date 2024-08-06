<?php

namespace App\Http\Requests\ScheduleOfSubject;

use App\Models\ScheduleOfSubject;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class UpdateScheduleOfSubjectRequest extends FormRequest
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

    protected function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            $data = $this->all();

            $hasOverlappingSchedule = ScheduleOfSubject::where('classroom_id', $data['classroom_id'])
                ->where('day', $data['day'])
                ->where(function ($query) use ($data) {
                    $query->whereBetween('start_time', [$data['start_time'], $data['end_time']])
                        ->orWhereBetween('end_time', [$data['start_time'], $data['end_time']])
                        ->orWhere(function ($query) use ($data) {
                            $query->where('start_time', '<', $data['start_time'])
                                ->where('end_time', '>', $data['end_time']);
                        });
                })->exists();

            if ($hasOverlappingSchedule) {
                $validator->errors()->add('schedule', 'Kelas sudah memiliki jadwal pada waktu tersebut.');
            }
        });
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