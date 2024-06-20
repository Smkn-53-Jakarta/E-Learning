{{-- @php
    $teachingSchedule = $teachingSchedule ?? null;
@endphp --}}
<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Penilaian Tugas
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
                                <a href="{{ url()->current() }}" class="text-muted text-hover-primary">Penilaian</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card card-flush mb-5">
                    <div class="card-body">
                        <h6 class="text-gray-900 text-uppercase mb-5">Tugas Pertemuan Ke-{{ $assignment->meeting }}</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr class="bg-light-primary">
                                        <th class="min-w-10px fw-medium">Judul</th>
                                        <th class="min-w-300px fw-normal">{{ $assignment->title }}</th>
                                    </tr>
                                    <tr>
                                        <th class="min-w-10px fw-medium">Deskripsi</th>
                                        <th class="min-w-300px fw-normal">{!! $assignment->description !!}</th>
                                    </tr>
                                    <tr>
                                        <th class="min-w-10px fw-medium">Waktu Mengerjakan</th>
                                        <th class="min-w-300px fw-normal">
                                            <div style="display: flex; flex-direction: column;">
                                                <div style="display: flex;">
                                                    <span style="margin-right: 10px;">Mulai :</span>
                                                    <span>{{ $assignment->start_date }}</span>
                                                </div>
                                                <div style="display: flex;">
                                                    <span style="margin-right: 10px;">Selesai :</span>
                                                    <span>{{ $assignment->end_date }}</span>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <form
                    action="{{ route('teacher-submissions.store', ['scheduleOfSubject' => $scheduleOfSubject->id, 'assignment' => $assignment->id]) }}"
                    method="post">
                    @csrf
                    <div class="card card-flush">
                        <div class="card-header mt-6">
                            <div class="card-title">
                                @can('teacher-submissions.create')
                                    <button class="btn btn-primary">Simpan</button>
                                @endcan
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                    <thead>
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="text-center">No</th>
                                            <th class="min-w-150px">Nis</th>
                                            <th class="min-w-300px">Nama</th>
                                            <th class="min-w-200px">Link Tugas</th>
                                            <th class="min-w-100px text-center">Nilai</th>
                                            <th class="min-w-300px">Komentar</th>
                                            <th class="min-w-200px">Tanggal Mengumpulkan</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach ($students as $student)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $student->identification_number }}</td>
                                                <td>{{ $student->user->name }}</td>
                                                <td>
                                                    @if (optional($student->submission)->link_drive)
                                                        <a href="{{ optional($student->submission)->link_drive }}"
                                                            target="_blank"
                                                            class="btn btn-bg-info btn-sm text-white">Link
                                                            Tugas
                                                            Siswa</a>
                                                    @endif
                                                </td>
                                                <input type="hidden"
                                                    name="submissions[{{ $loop->iteration - 1 }}][student_id]"
                                                    value="{{ $student->id }}">
                                                <td><input type="number" class="form-control form-control-sm"
                                                        name="submissions[{{ $loop->iteration - 1 }}][value]"
                                                        value="{{ optional($student->submission)->value }}"></td>
                                                <td>
                                                    <textarea id="" class="form-control form-control-sm" name="submissions[{{ $loop->iteration - 1 }}][comment]">{{ optional($student->submission)->comment }}</textarea>
                                                </td>
                                                <td class="text-center">
                                                    @if (optional($student->submission)->created_at)
                                                        @if (GlobalHelper::isLate($assignment->end_date, $student->submission->created_at))
                                                            <button
                                                                class="btn btn-bg-danger btn-sm text-white">2024-06-17
                                                                12:35:05</button>
                                                        @else
                                                            <button
                                                                class="btn btn-bg-success btn-sm text-white">2024-06-17
                                                                12:35:05</button>
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="d-grid gap-2 d-md-block pt-5">
                    <a href="{{ route('teacher-assignments.index', $scheduleOfSubject->id) }}"
                        class="btn btn-primary"><i class="bi bi-arrow-left-circle"></i>Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-AppLayout>
