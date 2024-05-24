<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Ubah Murid
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
                                <a href="{{ route('students.index') }}" class="text-muted text-hover-primary">Murid</a>
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
                <form action="{{ route('students.update', $student->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="d-flex flex-column flex-lg-row align-items-start mb-10">
                        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                            <div class="card card-flush">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Foto</h2>
                                    </div>
                                </div>
                                <div class="card-body text-center pt-0">
                                    <x-Form.InputImage name="profile_picture" :image="'users/images/' . $student->user->profile_picture" />
                                    <x-Form.InputError name="profile_picture" />
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-7 gap-lg-10 w-100">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column me-n7 pe-7">
                                        <div class="fv-row mb-10">
                                            <label class="fs-5 fw-bold form-label mb-2">
                                                <span class="required">Nama Siswa</span>
                                            </label>
                                            <input id="name"
                                                class="form-control mb-2 @error('name') is-invalid @enderror"
                                                placeholder="Masukan nama siswa" name="name"
                                                value="{{ old('name', $student->user->name) }}" maxlength="64"
                                                required />
                                            <x-Form.InputError name="name" />
                                        </div>
                                        <div class="fv-row mb-10">
                                            <label class="fs-5 fw-bold form-label mb-2">
                                                <span class="required">Status</span>
                                            </label>
                                            <select class="form-select" data-control="select2"
                                                data-placeholder="Pilih Status" data-hide-search="true" name="status_id"
                                                required>
                                                @foreach ($statuses as $status)
                                                    <option value="{{ $status->id }}" @selected(old('status_id', $student->user->status_id) == $status->id)>
                                                        {{ $status->name }}</option>
                                                @endforeach
                                            </select>
                                            <x-Form.InputError name="status_id" />
                                        </div>
                                        <div class="fv-row mb-10">
                                            <label class="fs-5 fw-bold form-label mb-2">
                                                <span class="required">Email</span>
                                            </label>
                                            <input type="email" id="email"
                                                class="form-control mb-2 @error('email') is-invalid @enderror"
                                                placeholder="Masukan email siswa" name="email"
                                                value="{{ old('email', $student->user->email) }}" maxlength="64"
                                                required />
                                            <x-Form.InputError name="email" />
                                        </div>
                                        <div class="fv-row mb-10">
                                            <label class="fs-5 fw-bold form-label mb-2">
                                                <span class="required">Kelas</span>
                                            </label>
                                            <select class="form-select" data-control="select2"
                                                data-placeholder="Pilih Kelas" name="classroom_id" required>
                                                @foreach ($classrooms as $classroom)
                                                    <option value="{{ $classroom->id }}" @selected(old('classroom_id', $student->classroom_id) == $classroom->id)>
                                                        {{ $classroom->name }}</option>
                                                @endforeach
                                            </select>
                                            <x-Form.InputError name="classroom_id" />
                                        </div>
                                        <div class="fv-row mb-10">
                                            <label class="fs-5 fw-bold form-label mb-2">
                                                <span class="required">Tahun Pelajaran</span>
                                            </label>
                                            <select class="form-select" data-control="select2"
                                                data-placeholder="Pilih Tahun Pelajaran" data-hide-search="true"
                                                name="school_year_id" required>
                                                @foreach ($schoolYears as $schoolYear)
                                                    <option value="{{ $schoolYear->id }}" @selected(old('school_year_id', $student->school_year_id) == $schoolYear->id)>
                                                        {{ $schoolYear->year }}</option>
                                                @endforeach
                                            </select>
                                            <x-Form.InputError name="school_year_id" />
                                        </div>
                                        <div class="fv-row mb-10">
                                            <label class="fs-5 fw-bold form-label mb-2">
                                                <span class="required">NIS</span>
                                            </label>
                                            <input type="number" id="identification_number"
                                                class="form-control mb-2 @error('identification_number') is-invalid @enderror"
                                                placeholder="Masukan NIS murid" name="identification_number"
                                                value="{{ old('identification_number', $student->identification_number) }}"
                                                required />
                                            <x-Form.InputError name="identification_number" />
                                        </div>
                                        <div class="d-flex gap-3">
                                            <a href="{{ RoutingHelper::editToIndexRoute() }}" class="btn btn-danger">
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
        <script>
            $('#name').maxlength({
                warningClass: "badge badge-success",
                limitReachedClass: "badge badge-danger"
            });

            $('#email').maxlength({
                warningClass: "badge badge-success",
                limitReachedClass: "badge badge-danger"
            });
        </script>
    @endpush
</x-AppLayout>
