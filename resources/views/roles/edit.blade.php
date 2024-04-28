<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Edit Role
                        </h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('roles.index') }}" class="text-muted text-hover-primary">Roles</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('roles.edit', $role->id) }}"
                                    class="text-muted text-hover-primary">Edit</a>
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
                    <form class="form card-body" action="{{ route('roles.update', $role->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="d-flex flex-column me-n7 pe-7">
                            <div class="fv-row mb-10">
                                <label class="fs-5 fw-bold form-label mb-2">
                                    <span class="required">Role name</span>
                                </label>
                                <input class="form-control mb-2 @error('name') is-invalid @enderror"
                                    placeholder="Enter role name" name="name"
                                    value="{{ old('name', $role->name) }}" />
                                <x-Form.InputError name="name" />
                            </div>
                            <div class="fv-row">
                                <label class="fs-5 fw-bold form-label mb-2">Role
                                    Permissions</label>
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5">
                                        <tbody class="text-gray-600 fw-semibold">
                                            <tr>
                                                <td class="text-gray-800">Access
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                        data-bs-toggle="tooltip"
                                                        title="Allows a full access to the system"></i>
                                                </td>
                                                <td>
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="kt_roles_select_all" />
                                                        <span class="form-check-label" for="kt_roles_select_all">Select
                                                            all</span>
                                                    </label>
                                                </td>
                                            </tr>
                                            @foreach ($features as $feature => $accesses)
                                                <tr>
                                                    <td class="text-gray-800 d-flex align-items-start">
                                                        Management {{ str_replace('-', ' ', $feature) }}
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-start flex-wrap gap-5">
                                                            @foreach ($accesses as $access)
                                                                @php
                                                                    $name = "accesses.$feature";
                                                                    $isChecked = $role->hasPermissionTo(
                                                                        "$feature.$access",
                                                                    );
                                                                    if (old($name)) {
                                                                        $isChecked = in_array($access, old($name));
                                                                    }
                                                                @endphp
                                                                <label
                                                                    class="form-check form-check-sm form-check-custom form-check-solid">
                                                                    <input class="form-check-input input-acess"
                                                                        type="checkbox" value="{{ $access }}"
                                                                        name="accesses[{{ $feature }}][]"
                                                                        @checked($isChecked) />
                                                                    <span class="form-check-label">
                                                                        {{ str_replace('-', ' ', $access) }}
                                                                    </span>
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
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
    @push('scripts')
        <script>
            $('#kt_roles_select_all').on('change', e => {
                $('.input-acess').each((index, input) => {
                    input.checked = e.target.checked;
                });
            });
        </script>
    @endpush
</x-AppLayout>
