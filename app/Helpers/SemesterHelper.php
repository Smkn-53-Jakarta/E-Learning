<?php

namespace App\Helpers;

use Carbon\Carbon;

class SemesterHelper
{
    public static function getStartDate()
    {
        $semesterDates = self::getSemesterDates();
        return $semesterDates['start_date'];
    }

    public static function getEndDate()
    {
        $semesterDates = self::getSemesterDates();
        return $semesterDates['end_date'];
    }

    private static function getSemesterDates()
    {
        $now = Carbon::now();

        $oddSemester = '2024-01-01 - 2024-06-30';
        $evenSemester = '2024-07-01 - 2024-12-30';

        list($evenStart, $evenEnd) = explode(' - ', $evenSemester);
        list($oddStart, $oddEnd) = explode(' - ', $oddSemester);

        $evenStart = Carbon::parse($evenStart);
        $evenEnd = Carbon::parse($evenEnd);
        $oddStart = Carbon::parse($oddStart);
        $oddEnd = Carbon::parse($oddEnd);

        $isInEvenSemester = $now->between($evenStart, $evenEnd);

        $startDate = $isInEvenSemester ? $evenStart : $oddStart;
        $endDate = $isInEvenSemester ? $evenEnd : $oddEnd;

        return [
            'start_date' => $startDate,
            'end_date' => $endDate
        ];
    }
}
