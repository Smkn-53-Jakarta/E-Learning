<div>
    <div class="card shadow-sm">
        <div class="card-header align-items-center flex-column justfiy-content-start fw-bold">
            <h6 class="card-title text-uppercase pt-2">{{ $extracurricularSchedule->extracurricular->name }}</h6>
            <p>{{ $extracurricularSchedule->day }} - {{ $extracurricularSchedule->start_time }} -
                {{ $extracurricularSchedule->end_time }}</p>
        </div>
        <div class="card-body">
            <div class="text-center mb-3">
                <img class="rounded-circle"
                    src="{{ FileHelper::getImage('users/images/' . $extracurricularSchedule->coach->profile_picture) }}"
                    alt="Foto Guru" height="150" width="150">
            </div>
            <table class="table">
                <tbody>
                    <tr>
                        <td class="p-1"><i class="bi bi-person fs-2"></i> Guru</td>
                        <td class="p-1">:</td>
                        <td class="p-1">{{ $extracurricularSchedule->coach->name }}</td>
                    </tr>
                    <tr>
                        <td class="p-1"><i class="bi bi-signpost-split fs-2"></i> Anggota</td>
                        <td class="p-1">:</td>
                        <td class="p-1 align-middle"><x-ExtracurricularSchedules.ListMembers :members="$extracurricularSchedule->members" /></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
