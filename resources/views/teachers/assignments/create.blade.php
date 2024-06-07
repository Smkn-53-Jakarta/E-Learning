<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Tambah Tugas
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
                                <a href="{{ url()->current() }}" class="text-muted text-hover-primary">Tambah</a>
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
                <form action="{{ route('teacher-assignments.store', $scheduleOfSubject->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex flex-column flex-lg-row align-items-start mb-10">
                        <div class="d-flex flex-column gap-7 gap-lg-10 w-100">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column me-n7 pe-7">
                                        <div class="fv-row mb-10">
                                            <label class="fs-5 fw-bold form-label mb-2">
                                                <span class="required">Judul Tugas</span>
                                            </label>
                                            <input id="title" class="form-control mb-2"
                                                placeholder="Masukan Judul Tugas" name="title"
                                                value="{{ old('title') }}" maxlength="64" required />
                                            <x-Form.InputError name="title" />
                                        </div>
                                        <div class="fv-row mb-10">
                                            <label class="fs-5 fw-bold form-label mb-2">
                                                <span class="required">Deskripsi</span>
                                            </label>
                                            <x-Form.CkEditor />
                                            <x-Form.InputError name="description" />
                                        </div>
                                        <div class="row mb-10">
                                            <div class="col-md-6">
                                                <label class="fs-5 fw-bold form-label mb-2">
                                                    <span class="required">Pertemuan</span>
                                                </label>
                                                <input type="number" id="meeting" class="form-control mb-2"
                                                    placeholder="Masukan Pertemuan" name="meeting"
                                                    value="{{ old('meeting') }}" maxlength="3"
                                                    pattern="/^-?\d+\.?\d*$/"
                                                    onKeyPress="if(this.value.length == 3) return false;" required />
                                                <x-Form.InputError name="meeting" />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="fs-5 fw-bold form-label mb-2">
                                                    <span class="required">Deadline</span>
                                                </label>
                                                <input class="form-control" placeholder="Pilih Deadline" id="deadline"
                                                    name="deadline" value="{{ old('deadline') }}" required />
                                                <x-Form.InputError name="deadline" />
                                            </div>
                                        </div>
                                        <div class="fv-row mb-10">
                                            <label class="fs-5 fw-bold form-label w-100">
                                                <span class="required">File</span>
                                                <div class="mt-2 d-flex align-items-center position-relative w-100">
                                                    <input class="form-control form-control-lg" id="formFileLg"
                                                        type="file" style="padding-left: 30px;" accept=".pdf"
                                                        name="file" required>
                                                    <i class="bi bi-file-earmark-arrow-up-fill fs-4"
                                                        style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
                                                </div>
                                            </label>
                                            <x-Form.InputError name="file" />
                                        </div>

                                        <div class="d-flex gap-3">
                                            <a href="{{ RoutingHelper::createToIndexRoute($scheduleOfSubject->id) }}"
                                                class="btn btn-danger">
                                                Cancel
                                            </a>
                                            <x-SaveButton>Simpan</x-SaveButton>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('assets/plugins/custom-ckeditor5/ckeditor.js') }}"></script>
        <script>
            $('#title').maxlength({
                warningClass: "badge badge-success",
                limitReachedClass: "badge badge-danger"
            });

            $('#meeting').maxlength({
                warningClass: "badge badge-success",
                limitReachedClass: "badge badge-danger"
            });

            $("#deadline").daterangepicker({
                timePicker: true,
                timePicker24Hour: true,
                startDate: moment(),
                locale: {
                    format: "M/DD HH:mm"
                }
            });
        </script>
    @endpush
</x-AppLayout>
