<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Ubah Pengumpulan Tugas
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
                                <a href="{{ route('student-schedule-of-subjects.index') }}"
                                    class="text-muted text-hover-primary">Jadwal
                                    Pelajaran</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('student-submissions.index', $scheduleOfSubject->id) }}"
                                    class="text-muted text-hover-primary">Pengumpulan
                                    Tugas</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ url()->current() }}" class="text-muted text-hover-primary">Ubah</a>
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
                    <form class="form card-body"
                        action="{{ route('student-submissions.update', ['scheduleOfSubject' => $scheduleOfSubject->id, 'assignment' => $assignment->id, 'submission' => $submission->id]) }}"
                        method="post">
                        @csrf
                        @method('PUT')
                        <div class="d-flex flex-column me-n7 pe-7">
                            <div class="fv-row mb-10">
                                <label class="fs-5 fw-bold form-label mb-2">
                                    <span class="required">Link Drive</span>
                                </label>
                                <input type="url"
                                    class="form-control mb-2 @error('link_drive') is-invalid @enderror"
                                    placeholder="Masukan Link Drive" name="link_drive"
                                    value="{{ old('link_drive', $submission->link_drive) }}" required />
                                <x-Form.InputError name="link_drive" />
                            </div>
                            <div class="d-flex gap-3">
                                <a href="{{ RoutingHelper::editToIndexRoute($scheduleOfSubject->id) }}"
                                    class="btn btn-danger">
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
</x-AppLayout>
