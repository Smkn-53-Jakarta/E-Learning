<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Request;

class GlobalHelper
{
    public static function getAccesses(): array
    {
        return [
            (object)[
                'name' => 'read'
            ],
            (object)[
                'name' => 'create'
            ],
            (object)[
                'name' => 'update'
            ],
            (object)[
                'name' => 'delete'
            ],
            (object)[
                'name' => 'restore'
            ],
            (object)[
                'name' => 'export'
            ],
        ];
    }

    public static function getFeatures($permissions)
    {
        $fitur = [];
        foreach ($permissions as $permission) {
            $route = explode('.', $permission->name);
            if (isset($fitur[$route[0]])) {
                array_push($fitur[$route[0]], $route[1]);
                continue;
            }
            $fitur[$route[0]] = [$route[1]];
        }

        return $fitur;
    }

    public static function formatPhoneNumber($phoneNumber)
    {
        $phoneNumber = preg_replace('/\D/', '', $phoneNumber);

        if (substr($phoneNumber, 0, 1) === '0') {
            $phoneNumber = '62' . substr($phoneNumber, 1);
        } else {
            $phoneNumber = '62' . $phoneNumber;
        }

        return $phoneNumber;
    }

    public static function getColors(): array
    {
        return [
            (object)[
                'name' => 'success'
            ],
            (object)[
                'name' => 'warning'
            ],
            (object)[
                'name' => 'danger'
            ],
            (object)[
                'name' => 'info'
            ],
            (object)[
                'name' => 'primary'
            ],
            (object)[
                'name' => 'light'
            ],
            (object)[
                'name' => 'dark'
            ]
        ];
    }

    public static function isCurrentUrl($list)
    {
        foreach ($list as $item) {
            if (Request::is($item)) {
                return true;
            }
        }
        return false;
    }

    public static function formatRupiah($number): string
    {
        $format_rupiah = "Rp " . number_format($number, 0, ',', '.');
        return $format_rupiah;
    }

    public static function formatDescription($description, $length)
    {
        $textOnly = strip_tags($description);

        $formatDescription = strlen($textOnly) > $length
            ? substr($textOnly, 0, $length) . '...'
            : $textOnly;

        return $formatDescription;
    }

    public static function isLate($endDate, $dateSubmission)
    {
        $endDateTime = Carbon::parse($endDate);
        $dateSubmissionTime = Carbon::parse($dateSubmission);

        return $dateSubmissionTime->greaterThan($endDateTime);
    }
}
