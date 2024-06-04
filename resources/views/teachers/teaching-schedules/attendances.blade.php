<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Jadwal Mengajar
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
                                    class="text-muted text-hover-primary">Jadwal Mengajar</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ url()->current() }}" class="text-muted text-hover-primary">Kehadiran</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="d-flex gap-5 justify-content-center">
                    <button type="button" class="btn btn-success btn-sm rounded-pill">
                        Hadir <span class="badge text-bg-secondary rounded-circle">{{ $totalPresent }}</span>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm rounded-pill">
                        Alfa <span class="badge text-bg-secondary rounded-circle">{{ $totalAbsent }}</span>
                    </button>
                    <button type="button" class="btn btn-info btn-sm rounded-pill">
                        Izin <span class="badge text-bg-secondary rounded-circle">{{ $totalPermission }}</span>
                    </button>
                    <button type="button" class="btn btn-warning btn-sm rounded-pill">
                        Sakit <span class="badge text-bg-secondary rounded-circle">{{ $totalSick }}</span>
                    </button>
                </div>
                <div class="row">
                    @if (count($students))
                        @foreach ($students as $student)
                            <div class="col-lg-3 mt-4">
                                <div class="card shadow-sm">
                                    <div class="card-header">
                                        <h3 class="card-title">{{ $student->user->name }}</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center mb-3">
                                            <img class="rounded-circle"
                                                src="{{ FileHelper::getImage('users/images/' . $student->user->profile_picture) }}"
                                                alt="Foto Siswa" height="100" width="100">
                                        </div>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="p-1"><i class="bi bi-person fs-2"></i> NIS</td>
                                                    <td class="p-1">:</td>
                                                    <td class="p-1">{{ $student->identification_number }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <select class="form-select form-select-sm form-select-solid status"
                                            data-control="select2" data-hide-search="true"
                                            data-student-id="{{ $student->id }}">
                                            <option value="Hadir" @selected(optional($student->studentAttendance)->status == 'Hadir')>Hadir</option>
                                            <option value="Alfa" @selected(optional($student->studentAttendance)->status == 'Alfa')>Alfa</option>
                                            <option value="Izin" @selected(optional($student->studentAttendance)->status == 'Izin')>Izin</option>
                                            <option value="Sakit" @selected(optional($student->studentAttendance)->status == 'Sakit')>Sakit</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <x-DataNotFound />
                    @endif
                </div>
                <div class="d-grid gap-2 d-md-block pt-5">
                    <a href="{{ route('teacher-teaching-schedules.index') }}" class="btn btn-primary me-3"><i
                            class="bi bi-arrow-left-circle"></i>Kembali</a>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.status').on('change', function() {
                    var studentId = $(this).data('student-id');
                    var status = $(this).val();

                    $.ajax({
                        url: `/guru/jadwal-mengajar/kehadiran/${studentId}`,
                        method: 'PUT',
                        data: {
                            status
                        },
                        success: function(response) {
                            console.log(response.message);
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText);
                        }
                    });
                });
            });
        </script>
    @endpush
</x-AppLayout>
