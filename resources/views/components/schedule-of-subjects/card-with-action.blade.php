<div class="card shadow-sm">
    <div class="card-header align-items-center flex-column justfiy-content-start">
        <h3 class="card-title text-uppercase">{{ $scheduleOfSubject->course->name }}</h3>
        <p>{{ $scheduleOfSubject->day }} - {{ $scheduleOfSubject->start_time }} - {{ $scheduleOfSubject->end_time }}</p>
    </div>
    <div class="card-body">
        <div class="text-center mb-3">
            <img class="rounded-circle"
                src="{{ FileHelper::getImage('users/images/' . $scheduleOfSubject->teacher->user->profile_picture) }}"
                alt="Foto Guru" height="200" width="200">
        </div>
        <table class="table">
            <tbody>
                <tr>
                    <td class="p-1"><i class="bi bi-person fs-2"></i> Guru</td>
                    <td class="p-1">:</td>
                    <td class="p-1">{{ $scheduleOfSubject->teacher->user->name }}</td>
                </tr>
                <tr>
                    <td class="p-1"><i class="bi bi-people fs-2"></i> Kelas</td>
                    <td class="p-1">:</td>
                    <td class="p-1">{{ $scheduleOfSubject->classroom->name }}</td>
                </tr>
            </tbody>
        </table>
        <div class="btn-group w-100">
            @can('schedule-of-subjects.update')
                <a href="{{ route('schedule-of-subjects.edit', $scheduleOfSubject->id) }}" class="btn btn-secondary">
                    <i class="bi bi-pen fs-4 text-info"></i>
                </a>
            @endcan
            @can('schedule-of-subjects.read')
                <a href="" class="btn btn-secondary">
                    <i class="bi bi-file-text fs-4 text-success"></i>
                </a>
            @endcan
            @can('schedule-of-subjects.delete')
                <form class="btn btn-secondary" action="{{ route('schedule-of-subjects.destroy', $scheduleOfSubject->id) }}"
                    method="post">
                    @csrf
                    @method('DELETE')
                    <a href="" onclick="confirmPopup(this, 'Akan menghapus jadwal mata pelajaran ini')">
                        <i class="bi bi-trash fs-4 text-danger"></i>
                    </a>
                </form>
            @endcan
        </div>
    </div>
</div>
