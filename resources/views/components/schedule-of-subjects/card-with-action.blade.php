<div class="card shadow-sm">
    <div class="card-header align-items-center flex-column justfiy-content-start">
        <h3 class="card-title text-uppercase">Bahasa Indonesia</h3>
        <p>Senin - 13:20 - 15:00</p>
    </div>
    <div class="card-body">
        <div class="text-center mb-3">
            <img class="rounded-circle"
                src="{{ FileHelper::getImage('users/images/' . auth()->user()->profile_picture) }}" alt="Foto Guru"
                height="200" width="200">
        </div>
        <table class="table">
            <tbody>
                <tr>
                    <td class="p-1"><i class="bi bi-person fs-2"></i> Guru</td>
                    <td class="p-1">:</td>
                    <td class="p-1">Kharisma Audina</td>
                </tr>
                <tr>
                    <td class="p-1"><i class="bi bi-people fs-2"></i> Kelas</td>
                    <td class="p-1">:</td>
                    <td class="p-1">XI TKJ 1</td>
                </tr>
            </tbody>
        </table>
        <div class="btn-group w-100">
            @can('schedule-of-subjects.update')
                <a href="" class="btn btn-secondary">
                    <i class="bi bi-pen fs-4 text-info"></i>
                </a>
            @endcan
            @can('schedule-of-subjects.read')
                <a href="" class="btn btn-secondary">
                    <i class="bi bi-file-text fs-4 text-success"></i>
                </a>
            @endcan
            @can('schedule-of-subjects.delete')
                <form class="btn btn-secondary" action="" method="post">
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
