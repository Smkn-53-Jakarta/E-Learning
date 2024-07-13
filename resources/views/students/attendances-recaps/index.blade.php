<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Rekap Absensi
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
                                <a href="{{ route('student-attendances-recaps.index', $scheduleOfSubject->id) }}"
                                    class="text-muted text-hover-primary">Rekap Absensi</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                {{-- col 1 --}}
                <div class="row w-100 mb-10">
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
                            @php
                                $now = \Carbon\Carbon::now();
                                $startTime = \Carbon\Carbon::parse($scheduleOfSubject->start_time);
                                $endTime = \Carbon\Carbon::parse($scheduleOfSubject->end_time);
                                $currentDay = $now->locale('id')->dayName;

                                if ($endTime->lessThan($startTime)) {
                                    $endTime->addDay();
                                }
                            @endphp
                            @if ($currentDay !== $scheduleOfSubject->day)
                                <button class="btn btn-warning btn-sm">Belum Mulai</button>
                            @elseif ($now->lessThan($startTime))
                                <button class="btn btn-warning btn-sm">Belum Mulai</button>
                            @elseif($now->greaterThan($endTime))
                                <button class="btn btn-warning btn-sm">Sudah Selesai</button>
                            @elseif ($hasAttended)
                                <button class="btn btn-success btn-sm">Sudah Absen</button>
                            @else
                                <button class="btn btn-danger btn-sm">Belum Absen!</button>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card card-flush">
                    <div class="card-body">
                        @if (count($attendanceRecaps))
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                    <thead>
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="text-center">No</th>
                                            <th class="min-w-100px">Status Absensi</th>
                                            <th class="min-w-200px">Tanggal</th>
                                            <th class="min-w-150px">Pertemuan</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach ($attendanceRecaps as $attendanceRecap)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                @php
                                                    $color = '';
                                                    if ($attendanceRecap->status == 'Hadir') {
                                                        $color = 'success';
                                                    } elseif ($attendanceRecap->status == 'Alfa') {
                                                        $color = 'danger';
                                                    } elseif ($attendanceRecap->status == 'Izin') {
                                                        $color = 'warning';
                                                    } elseif ($attendanceRecap->status == 'Sakit') {
                                                        $color = 'info';
                                                    }
                                                @endphp
                                                <td><button
                                                        class="btn btn-{{ $color }} btn-sm">{{ $attendanceRecap->status }}</button>
                                                </td>
                                                <td>{{ $attendanceRecap->attendance_time }}</td>
                                                <td>{{ $loop->iteration }}</td>
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
                    {!! $attendanceRecaps->appends($_GET)->links() !!}
                </div>
            </div>
        </div>
</x-AppLayout>
