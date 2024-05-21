<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Ubah Permission
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
                                <a href="{{ route('permissions.index') }}"
                                    class="text-muted text-hover-primary">Permissions</a>
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
                    <x-alert :status="session('status')">{{ session('message') }}</x-alert>
                @endif
                <div class="card">
                    <form class="form card-body" id="update_role_form"
                        action="{{ route('permissions.update', $permission->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="d-flex flex-column me-n7 pe-7">
                            <div class="fv-row mb-10">
                                <label class="fs-5 fw-bold form-label mb-2">
                                    <span class="required">Nama Permission</span>
                                </label>
                                <input class="form-control mb-2 @error('name') is-invalid @enderror"
                                    placeholder="Masukan Nama Permission" name="name"
                                    value="{{ old('name', explode('.', $permission->name)[0] ?? '') }}"
                                    pattern="^[^0-9.]+$"
                                    title="Masukkan hanya huruf dan karakter selain angka atau titik (.)" required />
                                <x-Form.InputError name="name" />
                            </div>
                            <div class="fv-row">
                                <label class="fs-5 fw-bold form-label mb-2">
                                    <span class="required">Permissions</span>
                                    <x-Form.InputError name="accesses" class="fw-normal" />
                                </label>
                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                    <thead>
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            @foreach (GlobalHelper::getAccesses() as $access)
                                                <th>{{ $access->name }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-600">
                                        <tr>
                                            @foreach (GlobalHelper::getAccesses() as $access)
                                                <td>
                                                    <div class="form-check form-switch ps-0">
                                                        <input class="form-check-input ms-0 access-checkbox"
                                                            type="checkbox" name="accesses[{{ $access->name }}]"
                                                            @checked(old('accesses.' . $access->name, explode('.', $permission->name)[1] == $access->name))>
                                                    </div>
                                                </td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
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
    @push('scripts')
        <script>
            $(document).ready(function() {
                @if (old('accesses'))
                    $('.access-checkbox').prop('checked', false);

                    let oldAccess = {!! json_encode(old('accesses')) !!};
                    let key = Object.keys(oldAccess)[0]
                    $('.access-checkbox').each(function() {
                        const name = $(this).attr('name');
                        $(this).prop('checked', `accesses[${key}]` == name);
                    });
                @endif

                $('.access-checkbox').change(function() {
                    $('.access-checkbox').not(this).prop('checked', false);
                });
            });
        </script>
    @endpush
</x-AppLayout>
