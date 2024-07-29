<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .table {
            border-collapse: collapse;
        }

        .table td,
        th {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }

        .table th {
            background-color: #D9D9D9;
        }

        .text-center {
            text-align: center;
        }

        .align-middle {
            vertical-align: middle;
        }

        .min-w-100px {
            min-width: 100px;
        }

        .min-w-150px {
            min-width: 150px;
        }

        .min-w-200px {
            min-width: 200px;
        }
    </style>
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center align-middle min-w-200px">Nama Murid</th>
                <th class="text-center align-middle min-w-150px">Nis</th>
                @foreach ($totalMeetings as $totalMeeting)
                    <th class="min-w-30px text-center">{{ $loop->iteration }}</th>
                @endforeach
                <th class="min-w-100px text-center">jml.hadir</th>
                <th class="min-w-100px text-center">jml.alfa</th>
                <th class="min-w-100px text-center">jml.izin</th>
                <th class="min-w-100px text-center">jml.sakit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                @php
                    $hadirCount = 0;
                    $alfaCount = 0;
                    $izinCount = 0;
                    $sakitCount = 0;
                @endphp
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-start">{{ $student->user->name }}</td>
                    <td class="text-start">{{ $student->identification_number }}</td>
                    @foreach ($student->studentAttendances as $studentAttendance)
                        <td class="text-center">
                            @if ($studentAttendance->status == 'Hadir')
                                <span>H</span>
                                @php $hadirCount++; @endphp
                            @elseif ($studentAttendance->status == 'Alfa')
                                <span>A</span>
                                @php $alfaCount++; @endphp
                            @elseif ($studentAttendance->status == 'Izin')
                                <span>I</span>
                                @php $izinCount++; @endphp
                            @elseif ($studentAttendance->status == 'Sakit')
                                <span>S</span>
                                @php $sakitCount++; @endphp
                            @else
                                <span>{{ $studentAttendance->status }}</span>
                            @endif
                        </td>
                    @endforeach
                    <td style="text-align: center;">{{ $hadirCount }}</td>
                    <td style="text-align: center;">{{ $alfaCount }}</td>
                    <td style="text-align: center;">{{ $izinCount }}</td>
                    <td style="text-align: center;">{{ $sakitCount }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
