<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Tambah Jadwal Mata Pelajaran
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
                                <a href="{{ route('schedule-of-subjects.index') }}"
                                    class="text-muted text-hover-primary">Jadwal Mata
                                    Pelajaran</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('schedule-of-subjects.create') }}"
                                    class="text-muted text-hover-primary">Tambah</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                @if (session('message'))
                    <x-Alert :status="session('status')">{{ session('message') }}</x-Alert>
                @endif
                <div class="card">
                    <form class="form card-body" action="{{ route('schedule-of-subjects.store') }}" method="post">
                        @csrf
                        <div class="d-flex flex-column me-n7 pe-7">
                            <div class="row mb-10">
                                <div class="col-md-6">
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Kelas</span>
                                    </label>
                                    <select class="form-select" data-control="select2" data-placeholder="Pilih Kelas"
                                        name="classroom_id" required>
                                        @foreach ($classrooms as $classroom)
                                            <option value="{{ $classroom->id }}" @selected(old('classroom_id') == $classroom->id)>
                                                {{ $classroom->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-Form.InputError name="classroom_id" />
                                </div>
                                <div class="col-md-6">
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Guru Mengajar</span>
                                    </label>
                                    <select class="form-select" data-control="select2"
                                        data-placeholder="Pilih Guru Mengajar" name="teacher_id" required>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}" @selected(old('teacher_id') == $teacher->id)>
                                                {{ $teacher->user->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-Form.InputError name="teacher_id" />
                                </div>
                            </div>
                            <div class="row mb-10">
                                <div class="col-md-6">
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Mata Pelajaran</span>
                                    </label>
                                    <select class="form-select" data-control="select2"
                                        data-placeholder="Pilih Mata Pelajaran" name="course_id" required>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}" @selected(old('course_id') == $course->id)>
                                                {{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-Form.InputError name="course_id" />
                                </div>
                                <div class="col-md-6">
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Hari</span>
                                    </label>
                                    <select class="form-select" data-control="select2" data-placeholder="Pilih Hari"
                                        name="day" required>
                                        <option value="Senin" @selected(old('day') == 'Senin')>Senin</option>
                                        <option value="Selasa" @selected(old('day') == 'Selasa')>Selasa</option>
                                        <option value="Rabu" @selected(old('day') == 'Rabu')>Rabu</option>
                                        <option value="Kamis" @selected(old('day') == 'Kamis')>Kamis</option>
                                        <option value="Jumat" @selected(old('day') == 'Jumat')>Jumat</option>
                                        <option value="Sabtu" @selected(old('day') == 'Sabtu')>Sabtu</option>
                                        <option value="Minggu" @selected(old('day') == 'Minggu')>Minggu</option>
                                    </select>
                                    <x-Form.InputError name="day" />
                                </div>
                            </div>
                            <div class="row mb-10">
                                <div class="col-md-6">
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Jam Mulai</span>
                                    </label>
                                    <input type="time" id="start_time"
                                        class="form-control mb-2 @error('start_time') is-invalid @enderror"
                                        placeholder="Masukan jam mulai" name="start_time"
                                        value="{{ old('start_time') }}" required />
                                    <x-Form.InputError name="start_time" />
                                </div>
                                <div class="col-md-6">
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Jam Selesai</span>
                                    </label>
                                    <input type="time" id="end_time"
                                        class="form-control mb-2 @error('end_time') is-invalid @enderror"
                                        placeholder="Masukan jam selesai" name="end_time" value="{{ old('end_time') }}"
                                        required />
                                    <x-Form.InputError name="end_time" />
                                </div>
                            </div>
                            <div class="d-flex gap-3">
                                <a href="{{ RoutingHelper::createToIndexRoute() }}" class="btn btn-danger">
                                    Cancel
                                </a>
                                <x-SaveButton>Simpan</x-SaveButton>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $("#start_time").flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
            });

            $("#end_time").flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
            });
        </script>
    @endpush
</x-AppLayout>
