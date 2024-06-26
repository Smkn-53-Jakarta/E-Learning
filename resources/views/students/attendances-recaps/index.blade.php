{{-- <style>
    /* Media query for dark mode */
    @media (prefers-color-scheme: dark) {
        .dark-mode {
            color: #a7a7a7 !important;
        }
    }

    /* Media query for light mode */
    @media (prefers-color-scheme: light) {
        .light-mode {
            color: #000000 !important;
        }
    }
</style> --}}
<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Rekap Absensi
                        </h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('student-dashboard.index') }}"
                                    class="text-muted text-hover-primary">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('student-schedule-of-subjects.index') }}"
                                    class="text-muted text-hover-primary">Jadwal Pelajaran</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('student-attendances-recaps.index') }}"
                                    class="text-muted text-hover-primary">Rekap-Absensi</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card card-header d-flex align-items-start mb-3 pb-5">
                    {{-- col 1 --}}
                    <div class="row w-100">
                        {{-- Content 1 --}}
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="py-5 px-5 d-flex rounded shadow-sm">
                                    <div class="d-flex align-items-top">
                                        <i class="bi bi-book-half"
                                            style="font-size: 28px; margin-right: 10px; color: #1fb082;"></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h3 class="mb-0">Bahasa Indonesia</h3>
                                        <p class="mb-0 light-mode dark-mode" style="color: #a7a7b8;">Mata
                                            Pelajaran</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-2 w-100">
                                <div class="py-5 px-5 d-flex rounded shadow-sm">
                                    <div class="d-flex align-items-top">
                                        <i class="bi bi-signpost-split"
                                            style="font-size: 28px; margin-right: 10px; color: #1fb082;"></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h3 class="mb-0">XII-TKJ</h3>
                                        <p class="mb-0 light-mode dark-mode" style="color: #a7a7b8;">Kelas
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Content 2 --}}
                        <div class="col-lg-3">
                            <div class="card mt-2 mt-lg-0">
                                <div class="py-5 px-5 d-flex rounded shadow-sm">
                                    <div class="d-flex align-items-top">
                                        <i class="bi bi-person-circle"
                                            style="font-size: 28px; margin-right: 10px; color: #1fb082;"></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h3 class="mb-0">Hafidz M.Kom</h3>
                                        <p class="mb-0 light-mode dark-mode" style="color: #a7a7b8;">Guru
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-2">
                                <div class="py-5 px-5 d-flex rounded shadow-sm">
                                    <div class="d-flex align-items-top">
                                        <i class="bi bi-clock-fill"
                                            style="font-size: 28px; margin-right: 10px; color: #1fb082;"></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h3 class="mb-0">08.00</h3>
                                        <p class="mb-0 light-mode dark-mode" style="color: #a7a7b8;">Jam
                                            Masuk</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Content 3 --}}
                        <div class="col-lg-2">
                            <div class="card mt-2 mt-lg-0">
                                <div class="py-5 px-5 d-flex rounded shadow-sm">
                                    <div class="d-flex align-items-top">
                                        <i class="bi bi-calendar-event"
                                            style="font-size: 28px; margin-right: 10px; color: #1fb082; "></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h3 class="mb-0">Jumat</h3>
                                        <p class="mb-0 light-mode dark-mode" style="color: #a7a7b8;">Hari
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-2">
                                <div class="py-5 px-5 d-flex rounded shadow-sm">
                                    <div class="d-flex align-items-top">
                                        <i class="bi bi-clock"
                                            style="font-size: 28px; margin-right: 10px; color: #1fb082; "></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h3 class="mb-0">10.00</h3>
                                        <p class="mb-0 light-mode dark-mode" style="color: #a7a7b8;">Jam
                                            Keluar</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1"></div>
                        {{-- Content Live Status --}}
                        <div class="col-lg-3">
                            <div
                                class="card card-flush py-5 px-5 rounded align-items-center border shadow-sm mt-2 mt-lg-0">
                                <h3 class="mb-3 d-flex position-relative">
                                    <i class="bi bi-record-circle"
                                        style="font-size: 18px; margin-right: 5px; color: #b01f3a;"></i>
                                    Live Status
                                </h3>
                                <button class="btn btn-danger btn-sm">Belum Absen!!!</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-flush">
                    <div class="card-header mt-6">
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative my-1 me-5">
                                <x-SearchInput placeholder="Cari Materi" />
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- @if (count($materials)) --}}
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="text-center">No</th>
                                        <th class="min-w-100px">Status Absensi</th>
                                        <th class="min-w-200px">Tanggal</th>
                                        <th class="min-w-400px">Mata Pelajaran</th>
                                        <th class="min-w-150px">Pertemuan</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    {{-- @foreach ($materials as $material) --}}
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td><button class="btn btn-success btn-sm">Hadir</button></td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                    {{-- @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                        {{-- @else
                        <x-DataNotFound />
                        @endif --}}
                    </div>
                </div>
            </div>
        </div>
</x-AppLayout>
