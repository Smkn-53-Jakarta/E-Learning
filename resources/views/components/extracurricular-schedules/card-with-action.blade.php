<div class="card shadow-sm">
    <div class="card-header align-items-center flex-column justfiy-content-start">
        <h3 class="card-title text-uppercase">{{ $extracurricularSchedule->extracurricular->name }}</h3>
        <p>{{ $extracurricularSchedule->day }} - {{ $extracurricularSchedule->start_time }} -
            {{ $extracurricularSchedule->end_time }}</p>
    </div>
    <div class="card-body">
        <div class="text-center mb-3">
            <img class="rounded-circle"
                src="{{ FileHelper::getImage('users/images/' . $extracurricularSchedule->coach->profile_picture) }}"
                alt="Foto Guru" height="200" width="200">
        </div>
        <table class="table">
            <tbody>
                <tr>
                    <td class="p-1"><i class="bi bi-person fs-2"></i> Guru</td>
                    <td class="p-1">:</td>
                    <td class="p-1">{{ $extracurricularSchedule->coach->name }}</td>
                </tr>
                <tr>
                    <td class="p-1"><i class="bi bi-person fs-2"></i> Anggota</td>
                    <td class="p-1">:</td>
                    <td class="p-1 align-middle"><x-ExtracurricularSchedules.ListMembers :members="$extracurricularSchedule->members" /></td>
                </tr>
            </tbody>
        </table>
        <div class="btn-group w-100">
            @if (Request::routeIs('extracurricular-schedules.trashed'))
                @can('extracurricular-schedules.restore')
                    <form class="btn btn-secondary"
                        action="{{ route('extracurricular-schedules.restore', $extracurricularSchedule->id) }}"
                        method="post" onclick="confirmPopup(this, 'Akan mengembalikan jadwal ekstrakurikuler ini')">
                        @csrf
                        <a href="#">
                            <i class="bi bi-arrow-clockwise fs-4 text-primary"></i>
                        </a>
                    </form>
                @endcan
                @can('extracurricular-schedules.delete')
                    <form class="btn btn-secondary"
                        action="{{ route('extracurricular-schedules.force-delete', $extracurricularSchedule->id) }}"
                        method="post" onclick="confirmPopup(this, 'Akan hapus permanen jadwal ekstrakurikuler ini')">
                        @csrf
                        <a href="#">
                            <i class="bi bi-trash fs-4 text-danger"></i>
                        </a>
                    </form>
                @endcan
            @else
                @can('extracurricular-schedules.update')
                    <a href="{{ route('extracurricular-schedules.edit', $extracurricularSchedule->id) }}"
                        class="btn btn-secondary">
                        <i class="bi bi-pen fs-4 text-info"></i>
                    </a>
                @endcan
                @can('extracurricular-schedules.read')
                    <a href="" class="btn btn-secondary">
                        <i class="bi bi-file-text fs-4 text-success"></i>
                    </a>
                @endcan
                @can('extracurricular-schedules.delete')
                    <form class="btn btn-secondary"
                        action="{{ route('extracurricular-schedules.destroy', $extracurricularSchedule->id) }}"
                        method="post" onclick="confirmPopup(this, 'Akan menghapus jadwal ekstrakurikuler ini')">
                        @csrf
                        @method('DELETE')
                        <a href="#">
                            <i class="bi bi-trash fs-4 text-danger"></i>
                        </a>
                    </form>
                @endcan
            @endif
        </div>
    </div>
</div>
