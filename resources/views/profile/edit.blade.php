<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Profile
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
                                <a href="{{ route('profile.index') }}">Profile</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="mt-2">
                    @if (session('message'))
                        <x-Alert :status="session('status')">{{ session('message') }}</x-Alert>
                    @endif
                </div>
                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0 cursor-pointer">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Informasi Profil</h3>
                        </div>
                    </div>
                    <form action="{{ route('profile.update', auth()->user()->id) }}" class="form" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body border-top p-9">
                            <div class="col-lg-6">
                                <div class="row mb-5">
                                    <label class="form-label required">Nama</label>
                                    <input id="name" type="text"
                                        class="form-control mb-2 @error('name') is-invalid @enderror"
                                        placeholder="Masukan Nama" name="name" value="{{ old('name', $user->name) }}"
                                        maxlength="64" required />
                                    <x-Form.InputError name="name" />
                                </div>
                                <div class="row">
                                    <label class="form-label required">Email</label>
                                    <input type="email" id="email" name="email"
                                        class="form-control mb-2 @error('email') is-invalid @enderror"
                                        placeholder="Enter Email" value="{{ old('email', $user->email) }}"
                                        maxlength="64" required />
                                    <x-Form.InputError name="email" />
                                </div>
                            </div>
                        </div>
                        <div class="card-footer py-6 px-9">
                            <x-SaveButton>Simpan</x-SaveButton>
                        </div>
                    </form>
                </div>
                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0 cursor-pointer">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Ubah Password</h3>
                        </div>
                    </div>
                    <form action="{{ route('password.update') }}" class="form" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body border-top p-9">
                            <div class="row mb-5">
                                <label class="form-label required">Password Saat Ini</label>
                                <input type="password" name="current_password"
                                    class="form-control mb-2 @error('current_password') is-invalid @enderror"
                                    placeholder="Masukan Password Saat ini" required autocomplete="off" />
                                <x-Form.InputError name="current_password" />
                            </div>
                            <div class="row mb-5">
                                <label class="form-label required">Password Baru</label>
                                <input type="password" name="password"
                                    class="form-control mb-2 @error('password') is-invalid @enderror"
                                    placeholder="Masukan Password Baru" required autocomplete="off" />
                                <x-Form.InputError name="password" />
                            </div>
                            <div class="row">
                                <label class="form-label required">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation"
                                    class="form-control mb-2 @error('password_confirmation') is-invalid @enderror"
                                    placeholder="Masukan Konfirmasi Password" required autocomplete="off" />
                                <x-Form.InputError name="password_confirmation" />
                            </div>
                        </div>
                        <div class="card-footer py-6 px-9">
                            <x-SaveButton id="savePassword">Simpan</x-SaveButton>
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

            $('#email').maxlength({
                warningClass: "badge badge-success",
                limitReachedClass: "badge badge-danger"
            });
        </script>
    @endpush
</x-AppLayout>
