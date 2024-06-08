<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Rekap Kehadiran
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
                                <a href="" class="text-muted text-hover-primary">Rekap Kehadiran</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card card-flush mb-5">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th class="min-w-10px fw-medium">Kelas</th>
                                        <th class="min-w-300px fw-normal">X-TKJ</th>
                                    </tr>
                                    <tr>
                                        <th class="min-w-10px fw-medium">Mata Pelajaran</th>
                                        <th class="min-w-300px fw-normal">Bahasa Inggris</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card card-flush">
                    <div class="card-header mt-6">
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative my-1 me-5">
                                <x-SearchInput placeholder="Cari Rekap Kehadiran" />
                            </div>
                        </div>
                        <div class="card-toolbar">
                            <div class="d-grid gap-2 d-md-block">
                                <a href="#" class="btn btn-light-primary me-3">Generate</a>
                                <a href="#" class="btn btn-primary me-3"><i class="bi bi-filter"></i>Filter
                                    Bulanan</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="text-center">No</th>
                                        <th class="min-w-250px text-start">Nama Siswa</th>
                                        <th class="min-w-150px text-start">NIS</th>
                                        <th class="min-w-30px text-center">1</th>
                                        <th class="min-w-30px text-center">2</th>
                                        <th class="min-w-30px text-center">3</th>
                                        <th class="min-w-30px text-center">4</th>
                                        <th class="min-w-100px text-center">jml.hadir</th>
                                        <th class="min-w-100px text-center">jml.alpha</th>
                                        <th class="min-w-100px text-center">jml.izin</th>
                                        <th class="min-w-100px text-center">jml.sakit</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-start">Agus Bambang Pamungkas</td>
                                        <td class="text-start">19200447</td>
                                        <td class="text-center">
                                            <span class="badge text-bg-success text-white">H</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge text-bg-danger text-white">A</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge text-bg-primary text-white">I</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge text-bg-warning text-white">S</span>
                                        </td>
                                        <td class="text-center">1</td>
                                        <td class="text-center">1</td>
                                        <td class="text-center">1</td>
                                        <td class="text-center">1</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card card-footer">
                    <div class="row">
                        <div class="col-7 px-0">
                            <a href="{{ route('teacher-teaching-schedules.index') }}"
                                class=" col-md-auto btn btn-primary me-3"><i
                                    class="bi bi-arrow-left-circle"></i>Kembali</a>
                        </div>
                        <div class="col-5 d-flex gap-3 justify-content-end px-0">
                            <button class="btn btn-success btn-sm">
                                H : Hadir
                            </button>
                            <button class="btn btn-danger btn-sm">
                                A : Alpha
                            </button>
                            <button class="btn btn-primary btn-sm">
                                I : Izin
                            </button>
                            <button class="btn btn-warning btn-sm">
                                S : Sakit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-AppLayout>
