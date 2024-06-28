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
        <div class="btn-group w-100">
            <a href="{{ route('student-attendances-recaps.index', $scheduleOfSubject->id) }}"
                class="btn btn-primary  btn-sm text-white">
                Masuk
            </a>
            <a href="{{ route('student-materials.index', $scheduleOfSubject->id) }}"
                class="btn btn-secondary btn-sm data-bs-toggle="tooltip" data-bs-placement="bottom"
                title="Ruang Materi">
                <svg class="currenColor" width="17" height="17" viewBox="0 0 24 24">
                    <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="currentColor" />
                    <path
                        d="M9.2 3H3C2.4 3 2 3.4 2 4V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V7C22 6.4 21.6 6 21 6H12L10.4 3.60001C10.2 3.20001 9.7 3 9.2 3Z"
                        fill="currentColor" />
                </svg>
            </a>
            <a href="{{ route('student-assignments.index', $scheduleOfSubject->id) }}"
                class="btn btn-secondary btn-sm data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ruang Tugas">
                <i class="bi bi-archive"></i>
            </a>
        </div>
    </div>
</div>
