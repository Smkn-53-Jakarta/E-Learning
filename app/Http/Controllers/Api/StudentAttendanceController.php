<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Requests\StudentAttendance\ChangeStatusRequest;
use App\Models\StudentAttendance;

class StudentAttendanceController extends ApiController
{
    public function changeStatus(ChangeStatusRequest $request, $studentId)
    {
        $data = $request->validated();

        $attendance = StudentAttendance::where('student_id', $studentId)
            ->whereDate('attendance_time', now()->format('Y-m-d'))
            ->first();

        if (!$attendance) {
            return $this->notFoundResponse(null, 'Data kehadiran tidak ditemukan untuk siswa ini hari ini');
        }

        $attendance->update([
            'status' => $data['status'],
        ]);

        return $this->successResponse(null, 'Status kehadiran berhasil diperbarui');
    }
}