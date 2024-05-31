<div class="card shadow-sm">
    <div class="card-header align-items-center flex-column justfiy-content-start fw-bold">
        <h6 class="card-title text-uppercase pt-2">{{ $teachingSchedule->course->name }}</h6>
        <p>{{ $teachingSchedule->day }} - {{ $teachingSchedule->start_time }} - {{ $teachingSchedule->end_time }}</p>
    </div>
    <div class="card-body">
        <div class="text-center mb-3">
            <img class="rounded-circle"
                src="{{ FileHelper::getImage('users/images/' . $teachingSchedule->teacher->user->profile_picture) }}"
                alt="Foto Guru" height="150" width="150">
        </div>
        <table class="table">
            <tbody>
                <tr>
                    <td class="p-1"><i class="bi bi-person fs-2"></i> Guru</td>
                    <td class="p-1">:</td>
                    <td class="p-1">{{ $teachingSchedule->teacher->user->name }}</td>
                </tr>
                <tr>
                    <td class="p-1"><i class="bi bi-signpost-split fs-2"></i> Kelas</td>
                    <td class="p-1">:</td>
                    <td class="p-1">{{ $teachingSchedule->classroom->name }}</td>
                </tr>
            </tbody>
        </table>
        <div class="container mt-5">
            <div class="btn-group w-100">
                @php
                    use Carbon\Carbon;

                    $now = Carbon::now();
                    $startTime = Carbon::parse($teachingSchedule->start_time);
                    $endTime = Carbon::parse($teachingSchedule->end_time);

                    if ($endTime->lessThan($startTime)) {
                        $endTime->addDay();
                    }

                    $scheduleDay = $teachingSchedule->day;
                    $todayDay = $now->locale('id')->dayName;
                @endphp
                @if ($todayDay !== $scheduleDay || $now->lessThan($startTime) || $now->greaterThan($endTime))
                    <a href="#" class="btn btn-warning text-white">
                        Belum Mulai
                    </a>
                @else
                    <a href="{{ route('teacher-attendances.index', $teachingSchedule->id) }}"
                        class="btn btn-primary text-white">
                        Masuk Kelas
                    </a>
                @endif

                <a href="#" class="btn btn-secondary">
                    <i class="bi bi-pen fs-4 text-primary"></i>
                </a>
                <a href="#" class="btn btn-secondary">
                    <i class="bi bi-file-text fs-4 text-success"></i>
                </a>
            </div>
        </div>
    </div>
</div>
