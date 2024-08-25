<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Ruang Tugas
                        </h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('student-dashboard.index') }}"
                                    class="text-muted text-hover-primary">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('student-schedule-of-subjects.index') }}"
                                    class="text-muted text-hover-primary">Jadwal Pelajaran</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ url()->current() }}" class="text-muted text-hover-primary">Ruang Tugas</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="row w-100 mb-2">
                    {{-- Content 1 --}}
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="py-5 px-5 d-flex rounded shadow-sm">
                                <div class="d-flex align-items-top">
                                    <i class="bi bi-book-half"
                                        style="font-size: 28px; margin-right: 10px; color: #1fb082;"></i>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <h3 class="mb-0">{{ $scheduleOfSubject->course->name }}</h3>
                                    <p class="mb-0 light-mode dark-mode" style="color: #a7a7b8;">Mata
                                        Pelajaran</p>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-2 w-100">
                            <div class="py-5 px-5 d-flex rounded shadow-sm">
                                <div class="d-flex align-items-top">
                                    <i class="bi bi-signpost-split"
                                        style="font-size: 28px; margin-right: 10px; color: #1fb082;"></i>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <h3 class="mb-0">{{ $scheduleOfSubject->classroom->name }}</h3>
                                    <p class="mb-0 light-mode dark-mode" style="color: #a7a7b8;">Kelas
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Content 2 --}}
                    <div class="col-lg-3">
                        <div class="card mt-2 mt-lg-0">
                            <div class="py-5 px-5 d-flex rounded shadow-sm">
                                <div class="d-flex align-items-top">
                                    <i class="bi bi-person-circle"
                                        style="font-size: 28px; margin-right: 10px; color: #1fb082;"></i>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <h3 class="mb-0">
                                        {{ GlobalHelper::limitText($scheduleOfSubject->teacher->user->name) }}</h3>
                                    <p class="mb-0 light-mode dark-mode" style="color: #a7a7b8;">Guru
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-2">
                            <div class="py-5 px-5 d-flex rounded shadow-sm">
                                <div class="d-flex align-items-top">
                                    <i class="bi bi-clock-fill"
                                        style="font-size: 28px; margin-right: 10px; color: #1fb082;"></i>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <h3 class="mb-0">{{ $scheduleOfSubject->start_time }}</h3>
                                    <p class="mb-0 light-mode dark-mode" style="color: #a7a7b8;">Jam
                                        Masuk</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Content 3 --}}
                    <div class="col-lg-3">
                        <div class="card mt-2 mt-lg-0">
                            <div class="py-5 px-5 d-flex rounded shadow-sm">
                                <div class="d-flex align-items-top">
                                    <i class="bi bi-calendar-event"
                                        style="font-size: 28px; margin-right: 10px; color: #1fb082; "></i>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <h3 class="mb-0">{{ $scheduleOfSubject->day }}</h3>
                                    <p class="mb-0 light-mode dark-mode" style="color: #a7a7b8;">Hari
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-2">
                            <div class="py-5 px-5 d-flex rounded shadow-sm">
                                <div class="d-flex align-items-top">
                                    <i class="bi bi-clock"
                                        style="font-size: 28px; margin-right: 10px; color: #1fb082; "></i>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <h3 class="mb-0">{{ $scheduleOfSubject->end_time }}</h3>
                                    <p class="mb-0 light-mode dark-mode" style="color: #a7a7b8;">Jam
                                        Keluar</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Content Live Status --}}
                    <div class="col-lg-3">
                        <div class="card card-flush py-5 rounded align-items-center border shadow-sm mt-2 mt-lg-0">
                            <h3 class="mb-3 d-flex position-relative">
                                <i class="bi bi-record-circle"
                                    style="font-size: 18px; margin-right: 5px; color: #b01f3a;"></i>
                                Live Status
                            </h3>
                            <button class="btn btn-success">Sudah Absen</button>
                        </div>
                    </div>
                </div>
                <div class="card card-flush">
                    <div class="card-header py-7">
                        <div class="card-title pt-3 mb-0 gap-4 gap-lg-10 gap-xl-15 nav nav-tabs border-bottom-0">
                            <a href="{{ url()->current() }}"
                                class="fs-4 fw-bold pb-3 border-bottom border-3 border-primary">Data
                                Tugas</a>
                            <a href="{{ route('student-submissions.index', ['scheduleOfSubject' => $scheduleOfSubject->id]) }}"
                                class="fs-4 fw-bold pb-3 text-muted">Data Nilai Tugas</a>
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
                                            <th class="min-w-50px">File</th>
                                            <th class="min-w-50px">Pertemuan</th>
                                            <th class="min-w-250px">Tanggal Mulai</th>
                                            <th class="min-w-250px">Tanggal Selesai</th>
                                            <th class="min-w-100px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach ($assignments as $assignment)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $assignment->title }}</td>
                                                <td>{!! $assignment->description !!} </td>
                                                <td>
                                                    <a href="{{ asset("storage/$assignment->file") }}"
                                                        target="_blank">
                                                        <div class="symbol symbol-25px pointer">
                                                            <img src="{{ asset('assets/media/svg/files/pdf.svg') }}"
                                                                alt="icon" />
                                                        </div>
                                                    </a>
                                                </td>
                                                <td class="text-center"> <span
                                                        class="badge text-bg-primary text-white">{{ $assignment->meeting }}</span>
                                                </td>
                                                <td>{{ $assignment->start_date }}</td>
                                                <td>{{ $assignment->end_date }}</td>
                                                <td>
                                                    <a href="#"
                                                        class="btn btn-sm btn-icon btn-active-light-primary"
                                                        data-kt-menu-trigger="click" data-kt-menu-placement="top-end">
                                                        <i class="bi bi-three-dots fs-3"></i>
                                                    </a>
                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                        data-kt-menu="true">
                                                        @can('student-assignments.read')
                                                            <div class="menu-item px-3">
                                                                <a href="{{ route('student-assignments.show', ['scheduleOfSubject' => $scheduleOfSubject->id, 'assignment' => $assignment->id]) }}"
                                                                    class="menu-link px-3">Unduh</a>
                                                            </div>
                                                        @endcan
                                                        @can('student-submissions.create')
                                                            <div class="menu-item px-3">
                                                                <a href="{{ route('student-submissions.create', ['scheduleOfSubject' => $scheduleOfSubject->id, 'assignment' => $assignment->id]) }}"
                                                                    class="menu-link px-3">Kerjakan</a>
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
