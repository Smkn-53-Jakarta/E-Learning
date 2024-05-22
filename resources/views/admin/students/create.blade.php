<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Tambah Siswa
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
                                <a href="{{ route('students.index') }}" class="text-muted text-hover-primary">Siswa</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('students.create') }}"
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
                    <form class="form card-body" action="{{ route('students.store') }}" method="post">
                        @csrf
                        <div class="d-flex flex-column me-n7 pe-7">
                            <div class="fv-row mb-10">
                                <label class="fs-5 fw-bold form-label mb-2">
                                    <span class="required">Nama Siswa</span>
                                </label>
                                <input id="name" class="form-control mb-2 @error('name') is-invalid @enderror"
                                    placeholder="Masukan nama siswa" name="name" value="{{ old('name') }}"
                                    maxlength="64" required />
                                <x-Form.InputError name="name" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="fs-5 fw-bold form-label mb-2">
                                    <span class="required">Status</span>
                                </label>
                                <select class="form-select" data-control="select2" data-placeholder="Pilih Status"
                                    data-hide-search="true">
                                    <option></option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                </select>
                            </div>
                            <div class="fv-row mb-10">
                                <label class="fs-5 fw-bold form-label mb-2">
                                    <span class="required">Email</span>
                                </label>
                                <input id="email" class="form-control mb-2 @error('email') is-invalid @enderror"
                                    placeholder="Masukan email siswa" name="email" value="{{ old('email') }}"
                                    maxlength="64" required />
                                <x-Form.InputError name="email" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="fs-5 fw-bold form-label mb-2">
                                    <span class="required">Kelas</span>
                                </label>
                                <select class="form-select" data-control="select2" data-placeholder="Pilih Kelas"
                                    data-hide-search="true">
                                    <option></option>
                                    <option value="1">Kelas 10</option>
                                    <option value="2">Kelas 11</option>
                                    <option value="2">Kelas 12</option>
                                </select>
                            </div>
                            <div class="fv-row mb-10">
                                <label class="fs-5 fw-bold form-label mb-2">
                                    <span class="required">Tahun Pelajaran</span>
                                </label>
                                <select class="form-select" data-control="select2"
                                    data-placeholder="Pilih Tahun Pelajaran" data-hide-search="true">
                                    <option></option>
                                    <option value="1">2023</option>
                                    <option value="2">2024</option>
                                    <option value="2">2025</option>
                                </select>
                            </div>
                            <div class="fv-row mb-10">
                                <label class="fs-5 fw-bold form-label mb-2">
                                    <span class="required">NIS</span>
                                </label>
                                <input id="identification_number"
                                    class="form-control mb-2 @error('identification_number') is-invalid @enderror"
                                    placeholder="Masukan NIS siswa" name="identification_number"
                                    value="{{ old('identification_number') }}" maxlength="64" required />
                                <x-Form.InputError name="identification_number" />
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
            $('#name').maxlength({
                warningClass: "badge badge-success",
                limitReachedClass: "badge badge-danger"
            });
        </script>
    @endpush
</x-AppLayout>
