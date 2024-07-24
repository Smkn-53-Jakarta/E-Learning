<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Monitoring
                        </h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard.index') }}"
                                    class="text-muted text-hover-primary">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('monitoring.index') }}"
                                    class="text-muted text-hover-primary">Monitoring</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="mt-2">
                    @if (session('message'))
                        <x-Alert :status="session('status')">{{ session('message') }}</x-Alert>
                    @endif
                </div>
                <div class="card card-flush">
                    <div class="card-header mt-6">
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative my-1 me-5">
                                <x-SearchInput placeholder="Cari Murid" />
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (count($scheduleOfSubjects))
                            <div class="table-responsive fixed-actions-table">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                    <thead>
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="text-center">No</th>
                                            <th class="min-w-175px">Mata Pelajaran</th>
                                            <th class="min-w-100px">Kelas</th>
                                            <th class="min-w-100px">Guru</th>
                                            <th class="min-w-50px text-center">Jam Mulai</th>
                                            <th class="min-w-50px text-center">Jam Selesai</th>
                                            <th class="min-w-50px text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($scheduleOfSubjects as $scheduleOfSubject)
                                            @php
                                                $now = \Carbon\Carbon::now();
                                                $startTime = \Carbon\Carbon::parse($scheduleOfSubject->start_time);
                                                $endTime = \Carbon\Carbon::parse($scheduleOfSubject->end_time);

                                                if ($endTime->lessThan($startTime)) {
                                                    $endTime->addDay();
                                                }
                                            @endphp
                                            <tr class="fw-semibold text-gray-600">
                                                <td class="text-center">1</td>
                                                <td>{{ $scheduleOfSubject->course->name }}</td>
                                                <td>{{ $scheduleOfSubject->classroom->name }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-35px me-3">
                                                            <img src="{{ FileHelper::getImage('users/images/' . $scheduleOfSubject->teacher->user->profile_picture) }}"
                                                                class="rounded-circle" alt="Profile Picture" />
                                                        </div>
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <span
                                                                class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">{{ $scheduleOfSubject->teacher->user->name }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">{{ $scheduleOfSubject->start_time }}</td>
                                                <td class="text-center">{{ $scheduleOfSubject->end_time }}</td>
                                                <td class="text-center">
                                                    @if ($now->lessThan($startTime))
                                                        <span class="badge bg-warning text-white">Belum Mulai</span>
                                                    @elseif($now->greaterThan($endTime))
                                                        <span class="badge bg-primary text-white">Sudah Selesai</span>
                                                    @elseif ($scheduleOfSubject->hasAttended)
                                                        <span class="badge bg-success text-white">Sudah Absen</span>
                                                    @else
                                                        <span class="badge bg-danger text-white">Belum Absen!</span>
                                                    @endif
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
            </div>
        </div>
    </div>
</x-AppLayout>
