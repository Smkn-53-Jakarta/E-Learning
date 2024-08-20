<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Rekap Ajar
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
                                <a href="{{ route('teacher-teaching-recaps.index') }}"
                                    class="text-muted text-hover-primary">Rekap Ajar</a>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ url()->current() }}" class="text-muted text-hover-primary">Detail</a>
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
                                <x-SearchInput placeholder="Cari Rekap" />
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="text-center">No</th>
                                        <th class="min-w-200px text-start">Mata Pelajaran</th>
                                        <th class="min-w-100px text-start">Kelas</th>
                                        <th class="min-w-50px text-center">Pertemuan</th>
                                        <th class="min-w-150px text-start">Tanggal</th>
                                        <th class="min-w-100px text-start">Jam Mulai</th>
                                        <th class="min-w-150px text-start">Jam Selesai</th>
                                        <th class="min-w-200px text-start">Guru Pengganti (BK)</th>
                                        <th class="min-w-150px text-start">Ket. Absensi</th>
                                        <th class="min-w-100px text-start">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    @foreach ($teacherAttendances as $teacherAttendance)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-start">
                                                {{ $teacherAttendance->scheduleOfSubject->course->name }}</td>
                                            <td class="text-start">
                                                {{ $teacherAttendance->scheduleOfSubject->classroom->name }}</td>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-start">
                                                {{ \Carbon\Carbon::parse($teacherAttendance->attendance_time)->format('Y-m-d') }}
                                            </td>
                                            <td class="text-start">
                                                {{ $teacherAttendance->scheduleOfSubject->start_time }}</td>
                                            <td class="text-start">{{ $teacherAttendance->scheduleOfSubject->end_time }}
                                            </td>
                                            <td>Ariyanti Octaviani</td>
                                            <td>Sakit</td>
                                            <td>
                                                @if ($teacherAttendance->status == 'Hadir')
                                                    <span
                                                        class="badge text-bg-success text-white">{{ $teacherAttendance->status }}</span>
                                                @else
                                                    <span
                                                        class="badge text-bg-danger text-white">{{ $teacherAttendance->status }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="d-flex p-5 justify-content-end">
                    {!! $teacherAttendances->appends($_GET)->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-AppLayout>
