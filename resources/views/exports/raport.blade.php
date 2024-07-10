<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .container {
            width: 100%;
            margin-top: 50px;
        }

        .container .left,
        .container .right {
            width: 40%;
            text-align: center;
            float: left;
        }

        .container .right {
            float: right;
        }

        .sign-line {
            margin-top: 80px;
            border-top: 1px solid #000;
            width: 60%;
            margin-left: auto;
            margin-right: auto;
        }

        .text-center {
            text-align: center;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table td {
            border: none;
            padding: 10px;
        }

        .left,
        .right {
            vertical-align: top;
        }

        .left-table,
        .right-table {
            width: 100%;
            border-collapse: collapse;
        }

        .left-table td,
        .right-table td {
            border: none;
            padding: 5px;
        }

        .left-table .header,
        .right-table .header {
            width: 150px;
        }

        .colon {
            width: 10px;
        }

        .table {
            border-collapse: collapse;
        }

        .table td,
        .table th {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }

        .min-w-50px {
            min-width: 50px;
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

        .min-w-250px {
            min-width: 250px;
        }

        .min-w-300px {
            min-width: 300px;
        }

        .min-w-350px {
            min-width: 350px;
        }

        .min-w-400px {
            min-width: 400px;
        }

        .align-middle {
            vertical-align: middle;
        }

        .note {
            border: 1px solid #000;
            padding: 10px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<h1 class="text-center">LAPORAN HASIL BELAJAR SISWA</h1>
<table class="info-table">
    <tr>
        <td class="left" style="width: 60%;">
            <table class="left-table">
                <tr>
                    <td class="header">Nama Peserta Didik</td>
                    <td class="colon">:</td>
                    <td>{{ $student->user->name }}</td>
                </tr>
                <tr>
                    <td class="header">Nomor Induk</td>
                    <td class="colon">:</td>
                    <td>{{ $student->identification_number }}</td>
                </tr>
                <tr>
                    <td class="header">Nama Sekolah</td>
                    <td class="colon">:</td>
                    <td>SMKN 53 Jakarta Barat</td>
                </tr>
                <tr>
                    <td class="header">Alamat Sekolah</td>
                    <td class="colon">:</td>
                    <td>Jl. Rusun Flamboyan, RT.14/RW.10, Cengkareng Bar., Kecamatan Cengkareng, Kota Jakarta Barat,
                        Daerah Khusus Ibukota Jakarta 11730</td>
                </tr>
            </table>
        </td>
        <td class="right" style="width: 40%;">
            <table class="right-table">
                <tr>
                    <td class="header">Kelas</td>
                    <td class="colon">:</td>
                    <td>{{ $student->classroom->name }}</td>
                </tr>
                <tr>
                    <td class="header">Semester</td>
                    <td class="colon">:</td>
                    <td>I (Satu)</td>
                </tr>
                <tr>
                    <td class="header">Tahun Pelajaran</td>
                    <td class="colon">:</td>
                    <td>2024/2026</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<table class="table" style="margin-bottom: 1rem;">
    <tr>
        <th class="align-middle" rowspan="2">No</th>
        <th class="align-middle min-w-250px" rowspan="2" style="text-align: center;">Nama Mata Pelajaran
        </th>
        <th class="align-middle min-w-50px text-center" rowspan="2" style="text-align: center;">Kkm</th>
        <th class="align-middle text-center" colspan="2" style="text-align: center;">Nilai</th>
    </tr>
    <tr>
        <th class="min-w-50px text-center" style="text-align: center;">Nilai Akhir</th>
        <th class="min-w-250px text-center" style="text-align: center;">Keterangan</th>
    </tr>
    <tbody>
        @foreach ($courses as $course)
            <tr>
                <td>{{ $loop->iteration }}.</td>
                <td>{{ $course->name }}</td>
                <td style="text-align: center;">{{ $course->kkm }}</td>
                <td style="text-align: center;">
                    {{ round((optional($course->raport)->average_value + optional($course->raport)->uts + optional($course->raport)->uas) / 3) }}
                </td>
                <td>
                    {{ optional($course->raport)->information ? optional($course->raport)->information : '-' }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<table class="table" style="margin-bottom: 1rem;">
    <tr>
        <th>No</th>
        <th style="text-align: center; min-width: 385px;">Ketidakhadiran</th>
        <th class="min-w-250px" style="text-align: center;">Hari</th>
    </tr>
    <tbody>
        <tr>
            <td>1.</td>
            <td>Izin</td>
            <td style="text-align: center">
                {{ $totalPermission ? $totalPermission : '-' }}</td>
        </tr>
        <tr>
            <td>2.</td>
            <td>Sakit</td>
            <td style="text-align: center">{{ $totalSick ? $totalSick : '-' }}</td>
        </tr>
        <tr>
            <td>3.</td>
            <td>Tanpa Keterangan</td>
            <td style="text-align: center">{{ $totalAlpha ? $totalAlpha : '-' }}
            </td>
        </tr>
    </tbody>
</table>
@if (count($extracurriculars))
    <table class="table" style="margin-bottom: 1rem;">
        <tr>
            <th>No</th>
            <th style="text-align: center; min-width: 385px;">Ekstrakurikuler</th>
            <th class="min-w-250px" style="text-align: center;">Nilai</th>
        </tr>
        <tbody>
            @foreach ($extracurriculars as $extracurricular)
                <tr>
                    <th>{{ $loop->iteration }}.</th>
                    <th>{{ $extracurricular->name }}</th>
                    <th style="text-align: center">
                        {{ optional($extracurricular->extracurricularValue)->value }}
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
<div>
    <h3>Catatan Wali Kelas</h3>
    <div class="note">
        <p>{{ $homeRoomNote->notes }}</p>
    </div>
</div>

<div class="container">
    <div class="left">
        <p>Mengetahui:</p>
        <p>Orang tua/Wali,</p>
        <div class="sign-line"></div>
    </div>
    <div class="right">
        <p>Jakarta, {{ \Carbon\Carbon::now()->isoFormat('D MMMM YYYY') }}</p>
        <p>Wali Kelas,</p>
        <div class="sign-line"></div>
    </div>
</div>

<body>

</body>

</html>
