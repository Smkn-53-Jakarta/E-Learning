<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Archive Tugas
                        </h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('teacher-dashboard.index') }}"
                                    class="text-muted text-hover-primary">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('teacher-teaching-schedules.index') }}"
                                    class="text-muted text-hover-primary">Jadwal
                                    Mengajar</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('teacher-assignments.index', $scheduleOfSubject->id) }}"
                                    class="text-muted text-hover-primary">Ruang Tugas</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ url()->current() }}" class="text-muted text-hover-primary">Archive Tugas</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card card-flush">
                    <div class="card-header mt-6">
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative my-1 me-5">
                                <x-SearchInput placeholder="Cari Tugas" />
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (count($assignments))
                            <div class="table-responsive fixed-actions-table">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                    <thead>
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="text-center">No</th>
                                            <th class="min-w-400px">Judul</th>
                                            <th class="min-w-300px">Deskripsi</th>
                                            <th class="min-w-250px">File</th>
                                            <th class="min-w-250px">Pertemuan</th>
                                            <th class="min-w-250px">Tanggal Mulai</th>
                                            <th class="min-w-250px">Tanggal Selesai</th>
                                            <th class="min-w-250px">Dihapus Pada</th>
                                            <th class="min-w-100px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach ($assignments as $assignment)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $assignment->title }}</td>
                                                <td>{{ GlobalHelper::formatDescription($assignment->description, 20) }}
                                                </td>
                                                <td>
                                                    <a href="{{ asset("storage/$assignment->file") }}" target="_blank">
                                                        <div class="symbol symbol-25px pointer">
                                                            <img src="{{ asset('assets/media/svg/files/pdf.svg') }}"
                                                                alt="icon" />
                                                        </div>
                                                    </a>
                                                </td>
                                                <td>{{ $assignment->meeting }}</td>
                                                <td>{{ $assignment->start_date }}</td>
                                                <td>{{ $assignment->end_date }}</td>
                                                <td>{{ $assignment->deleted_at->diffForHumans() }}</td>
                                                <td>
                                                    <a href="#"
                                                        class="btn btn-sm btn-icon btn-active-light-primary"
                                                        data-kt-menu-trigger="click" data-kt-menu-placement="top-end">
                                                        <i class="bi bi-three-dots fs-3"></i>
                                                    </a>
                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                        data-kt-menu="true">
                                                        @can('teacher-assignments.restore')
                                                            <div class="menu-item px-3">
                                                                <form
                                                                    action="{{ route('teacher-assignments.restore', ['scheduleOfSubject' => $scheduleOfSubject->id, 'assignment' => $assignment->id]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <a href="#" class="menu-link px-3"
                                                                        onclick="confirmPopup(this, 'Akan mengembalikan tugas ini')">Pulihkan</a>
                                                                </form>
                                                            </div>
                                                        @endcan
                                                        @can('teacher-assignments.delete')
                                                            <div class="menu-item px-3">
                                                                <form
                                                                    action="{{ route('teacher-assignments.force-delete', ['scheduleOfSubject' => $scheduleOfSubject->id, 'assignment' => $assignment->id]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <a href="#" class="menu-link px-3"
                                                                        onclick="confirmPopup(this, 'Akan menghapus permanen tugas ini')">Hapus
                                                                        Permanen</a>
                                                                </form>
                                                            </div>
                                                        @endcan
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <x-DataNotFound />
                        @endif
                    </div>
                </div>
                <div class="d-flex p-5 justify-content-end">
                    {!! $assignments->appends($_GET)->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-AppLayout>
