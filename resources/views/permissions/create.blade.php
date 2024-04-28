<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Tambah Permission
                        </h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('permissions.index') }}"
                                    class="text-muted text-hover-primary">Permissions</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('permissions.create') }}"
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
                    <form class="form card-body" action="{{ route('permissions.store') }}" method="post">
                        @csrf
                        <div class="d-flex flex-column me-n7 pe-7">
                            <div class="fv-row mb-10">
                                <label class="fs-5 fw-bold form-label mb-2">
                                    <span class="required">Nama Permission</span>
                                </label>
                                <input class="form-control mb-2 @error('name') is-invalid @enderror"
                                    placeholder="Masukan Nama Permissions" name="name" value="{{ old('name') }}"
                                    pattern="^[^0-9.]+$"
                                    title="Masukkan hanya huruf dan karakter selain angka atau titik (.)" required />
                                <x-Form.InputError name="name" />
                            </div>
                            <div class="fv-row">
                                <label class="fs-5 fw-bold form-label mb-2">
                                    <span class="required">Permissions</span>
                                    <x-Form.InputError name="accesses" class="fw-normal" />
                                </label>
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                        <thead>
                                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                @foreach (GlobalHelper::getAccesses() as $access)
                                                    <th class="min-w-150px">{{ $access->name }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-600">
                                            <tr>
                                                @foreach (GlobalHelper::getAccesses() as $access)
                                                    <td>
                                                        <div class="form-check form-switch ps-0">
                                                            <input class="form-check-input ms-0" type="checkbox"
                                                                name="accesses[{{ $access->name }}]"
                                                                @checked(old('accesses.' . $access->name))>
                                                        </div>
                                                    </td>
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer row">
                                <x-SaveButton>Simpan</x-SaveButton>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-AppLayout>
