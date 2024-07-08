{{-- Card 1 --}}
@php
    use Carbon\Carbon;

    $now = Carbon::now();
    $startTime = Carbon::parse($scheduleOfSubject->start_time);
    $endTime = Carbon::parse($scheduleOfSubject->end_time);

    if ($endTime->lessThan($startTime)) {
        $endTime->addDay();
    }
@endphp
<div class="card shadow-sm">
    <div class="card-header align-items-center flex-column justfiy-content-start fw-bold">
        <h6 class="card-title text-uppercase pt-2">{{ $scheduleOfSubject->course->name }}</h6>
        <p>{{ $scheduleOfSubject->day }} - {{ $scheduleOfSubject->start_time }} - {{ $scheduleOfSubject->end_time }}</p>
    </div>
    <div class="card-body">
        <div class="text-center mb-3">
            <img class="rounded-circle"
                src="{{ FileHelper::getImage('users/images/' . $scheduleOfSubject->teacher->user->profile_picture) }}"
                alt="Foto Guru" height="150" width="150">
        </div>
        <table class="table">
            <tbody>
                <tr>
                    <td class="p-1"><i class="bi bi-person fs-2"></i> Guru</td>
                    <td class="p-1">:</td>
                    <td class="p-1">{{ $scheduleOfSubject->teacher->user->name }}</td>
                </tr>
                <tr>
                    <td class="p-1"><i class="bi bi-signpost-split fs-2"></i> Kelas</td>
                    <td class="p-1">:</td>
                    <td class="p-1">{{ $scheduleOfSubject->classroom->name }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    @if ($now->lessThan($startTime))
        <div class="card-footer d-flex align-items-center justify-content-center fw-bold bg-primary"
            style="height: 40px;">
            <h3 class="card-title text-center text-white">Belum Mulai</h3>
        </div>
    @elseif($now->greaterThan($endTime))
        <div class="card-footer d-flex align-items-center justify-content-center fw-bold bg-warning"
            style="height: 40px;">
            <h3 class="card-title text-center text-white">Sudah Selesai</h3>
        </div>
    @elseif ($scheduleOfSubject->hasAttended)
        <div class="card-footer d-flex align-items-center justify-content-center fw-bold bg-success"
            style="height: 40px;">
            <h3 class="card-title text-center text-white">Sudah Absen</h3>
        </div>
    @else
        <div class="card-footer d-flex align-items-center justify-content-center fw-bold bg-danger"
            style="height: 40px;">
            <h3 class="card-title text-center text-white">Belum Absen!!!</h3>
        </div>
    @endif
</div>
