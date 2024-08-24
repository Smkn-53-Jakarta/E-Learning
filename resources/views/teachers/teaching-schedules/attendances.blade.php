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
                <div class="mt-2">
                    @if (session('message'))
                        <x-Alert :status="session('status')">{{ session('message') }}</x-Alert>
                    @endif
                </div>
                <form action="{{ route('teacher-attendances.store', $scheduleOfSubject->id) }}" method="POST">
                    @csrf
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
                        {{-- Status  Teacher --}}
                        <div class="col-lg-3">
                            <div class="card card-flush py-6 rounded align-items-center border shadow-sm mt-2 mt-lg-0">
                                <div class="card-body py-1">
                                    <div class="card-header">
                                        <h3 class="card-title d-flex position-relative">
                                            <i class="bi bi-record-circle"
                                                style="font-size: 18px; margin-right: 5px; color: #b01f3a;"></i>
                                            Absen Guru
                                        </h3>
                                    </div>
                                    <select class="form-select form-select-sm form-select-solid status"
                                        data-control="select2" data-hide-search="true" name="status" required>
                                        <option>Pilih Status</option>
                                        <option value="Hadir" @selected(old('status', $teacherAttendance->status) == 'Hadir')>Hadir</option>
                                        <option value="Tidak Hadir" @selected(old('status', $teacherAttendance->status) == 'Tidak Hadir')>Tidak Hadir</option>
                                    </select>
                                    <x-Form.InputError name="status" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card me-md-5 mb-5 p-5">
                        <div class="row mb-3">
                            {{-- Name Caption --}}
                            <div class="col-md-6">
                                <div class="my-4 px-5 d-flex rounded">
                                    <div class="d-flex align-items-top">
                                        <i class="bi bi-pen"
                                            style="font-size: 28px; margin-right: 10px; color: #1fb082;"></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center" style="width: 100%">
                                        <label for="information" class="form-label mb-2">Keterangan
                                            Absensi</label>
                                        <input id="information" type="text" class="form-control form-control-sm"
                                            placeholder="Diisi jika tidak hadir oleh pengganti (Opsional)"
                                            name="information" maxlength="255"
                                            value="{{ old('information', $teacherAttendance->information) }}">
                                        <x-Form.InputError name="information" />
                                    </div>
                                </div>
                            </div>
                            {{-- Noted --}}
                            <div class="col-md-6">
                                <div class="my-4 px-5 d-flex rounded">
                                    <div class="d-flex align-items-top">
                                        <i class="bi bi-people-fill"
                                            style="font-size: 28px; margin-right: 10px; color: #1fb082;"></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center" style="width: 100%">
                                        <label for="information" class="form-label mb-2">Guru Pengganti
                                            (BK)</label>
                                        <input id="substitute_teacher" type="text"
                                            class="form-control form-control-sm"
                                            placeholder="Diisi jika tidak hadir oleh pengganti (Wajib)"
                                            name="substitute_teacher" maxlength="64"
                                            value="{{ old('substitute_teacher', $teacherAttendance->substitute_teacher) }}">
                                        <x-Form.InputError name="substitute_teacher" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-3 d-flex justify-content-end">
                                <x-SaveButton>Simpan</x-SaveButton>
                            </div>
                        </div>
                    </div>
                </form>
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

                $('#information').maxlength({
                    warningClass: "badge badge-success",
                    limitReachedClass: "badge badge-danger"
                });

                $('#substitute_teacher').maxlength({
                    warningClass: "badge badge-success",
                    limitReachedClass: "badge badge-danger"
                });
            });
        </script>
    @endpush
</x-AppLayout>
