<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Ruang Materi
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
                                <a href="" class="text-muted text-hover-primary">Ruang Materi</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card card-flush">
                    <div class="card-header mt-6">
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative my-1 me-5">
                                <x-SearchInput placeholder="Cari Materi" />
                            </div>
                        </div>
                        <div class="card-toolbar">
                            <a href="" class="btn btn-light-primary me-3">
                                <i class="fa-solid fa-trash-can"></i>
                                Sampah
                            </a>
                            <x-AddButton :url="route('teacher-materials.create')">Tambah Materi</x-AddButton>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive fixed-actions-table">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="text-center">No</th>
                                        <th class="min-w-250px">Judul</th>
                                        <th class="min-w-250px">Deskripsi</th>
                                        <th class="min-w-400px">File</th>
                                        <th class="min-w-250px">History Update</th>
                                        <th class="min-w-200px">Dibuat Pada</th>
                                        <th class="min-w-200px">Diubah Pada</th>
                                        <th class="min-w-100px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>Bab 1 Pengenalan & Struktur</td>
                                        <td>Dibaca & dipahami</td>
                                        <td>
                                            <div class="mb-3 d-flex align-items-center position-relative"
                                                style="width: 350px;">
                                                <input class="form-control form-control-sm" id="formFileSm"
                                                    type="file" style="padding-left: 30px;">
                                                <i class="bi bi-file-earmark-arrow-up-fill"
                                                    style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
                                                <i class="bi bi-x-circle-fill" id="clearFile"
                                                    style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
                                            </div>
                                        </td>
                                        <td>12-06-2026</td>
                                        <td>01-06-2024</td>
                                        <td>-</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-icon btn-active-light-primary"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="top-end">
                                                <i class="bi bi-three-dots fs-3"></i>
                                            </a>
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                data-kt-menu="true">
                                                <div class="menu-item px-3">
                                                    <a href="" class="menu-link px-3">Ubah</a>
                                                    <a href="" class="menu-link px-3">Hapus</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-center">2</td>
                                        <td>Bab 2 Symbol Struktur</td>
                                        <td>Dibaca & dipahami</td>
                                        <td>
                                            <div class="mb-3 d-flex align-items-center position-relative"
                                                style="width: 350px;">
                                                <input class="form-control form-control-sm" id="formFileSm"
                                                    type="file" style="padding-left: 30px;">
                                                <i class="bi bi-file-earmark-arrow-up-fill"
                                                    style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
                                                <i class="bi bi-x-circle-fill" id="clearFile"
                                                    style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
                                            </div>
                                        </td>
                                        <td>12-06-2026</td>
                                        <td>01-06-2024</td>
                                        <td>-</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-icon btn-active-light-primary"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="top-end">
                                                <i class="bi bi-three-dots fs-3"></i>
                                            </a>
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                data-kt-menu="true">
                                                <div class="menu-item px-3">
                                                    <a href="" class="menu-link px-3">Ubah</a>
                                                    <a href="" class="menu-link px-3">Hapus</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2 d-md-block pt-5">
                    <a href="{{ route('teacher-teaching-schedules.index') }}" class="btn btn-primary me-3"><i
                            class="bi bi-arrow-left-circle"></i>Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-AppLayout>
