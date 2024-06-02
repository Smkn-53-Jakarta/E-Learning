<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Tambah Materi
                        </h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="" class="text-muted text-hover-primary">Dashboard</a>
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
                                <a href="{{ route('teacher-materials.index') }}"
                                    class="text-muted text-hover-primary">Ruang Materi</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="" class="text-muted text-hover-primary">Tambah Materi</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                {{-- @if (session('message'))
                    <x-Alert :status="session('status')">{{ session('message') }}</x-Alert>
                @endif --}}
                <form action="#route" method="post" enctype="multipart/form-data">
                    {{-- @csrf --}}
                    <div class="d-flex flex-column flex-lg-row align-items-start mb-10">
                        <div class="d-flex flex-column gap-7 gap-lg-10 w-100">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column me-n7 pe-7">
                                        <div class="fv-row mb-10">
                                            <label class="fs-5 fw-bold form-label mb-2">
                                                <span class="required">Judul Materi</span>
                                            </label>
                                            <input id="name" class="form-control mb-2"
                                                placeholder="Masukan Nama Materi" name="name" value=""
                                                maxlength="64" required />
                                            <x-Form.InputError name="name" />
                                        </div>
                                        <div class="fv-row mb-10">
                                            <label class="fs-5 fw-bold form-label mb-2">
                                                <span class="required">Deskripsi</span>
                                            </label>
                                            <div class="input-group">
                                                <textarea class="form-control" placeholder="Masukkan Deskripsi" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        <div class="fv-row mb-10">
                                            <label class="fs-5 fw-bold form-label">
                                                <span class="required">File</span>
                                                <div class="mt-2 d-flex align-items-center position-relative"
                                                    style="width: 1190px;">
                                                    <input class="form-control form-control-lg" id="formFileLg"
                                                        type="file" style="padding-left: 30px;">
                                                    <i class="bi bi-file-earmark-arrow-up-fill fs-4"
                                                        style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
                                                    <i class="bi bi-x-circle-fill" id="clearFile"
                                                        style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
                                                </div>
                                            </label>

                                        </div>
                                        <div class="fv-row mb-10">
                                            <label class="fs-5 fw-bold form-label mb-2">
                                                <span class="required">Type</span>
                                            </label>
                                            <select class="form-select" data-control="select2"
                                                data-placeholder="Pilih Type" data-hide-search="true" name="status_id"
                                                required>
                                                <option value="" disabled selected>Pilih Type</option>
                                                <option value="1">Type A</option>
                                                <option value="2">Type B</option>
                                                <option value="3">Type C</option>
                                            </select>
                                            {{-- <x-Form.InputError
                                                name="status_id" /> --}}
                                        </div>
                                        <div class="d-flex gap-3">
                                            <a href="{{ RoutingHelper::createToIndexRoute() }}" class="btn btn-danger">
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
</x-AppLayout>
