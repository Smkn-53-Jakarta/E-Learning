{{-- @php
    $teachingSchedule = $teachingSchedule ?? null;
@endphp --}}
<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Penilaian Tugas
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
                                <a href="{{ route('teacher-assignments.index', $scheduleOfSubject->id) }}"
                                    class="text-muted text-hover-primary">Ruang Tugas</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="" class="text-muted text-hover-primary">Penilaian</a>
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
                        <h6 class="text-gray-900 text-uppercase mb-5">Tugas Pertemuan Ke-3</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr class="bg-light-primary">
                                        <th class="min-w-10px fw-medium">Judul</th>
                                        <th class="min-w-300px fw-normal">Tugas Latihan Pertemuan Ke-3</th>
                                    </tr>
                                    <tr>
                                        <th class="min-w-10px fw-medium">Deskripsi</th>
                                        <th class="min-w-300px fw-normal">Silakan mengerjakan latihan ini (Latihan
                                            Ketiga) di
                                            Google Formulir dengan tautan https://bit.ly/43fdOMg. Tenggat hari Minggu,
                                            31 Maret 2024, Pukul 23.59. Setelah selesai mengerjakan, unggah tautan
                                            screenshot nilai di ruang tugas! Less</th>
                                    </tr>
                                    <tr>
                                        <th class="min-w-10px fw-medium">Waktu Mengerjakan</th>
                                        <th class="min-w-300px fw-normal">
                                            <div style="display: flex; flex-direction: column;">
                                                <div style="display: flex;">
                                                    <span style="margin-right: 10px;">Mulai :</span>
                                                    <span>2024-03-25 13:20:00</span>
                                                </div>
                                                <div style="display: flex;">
                                                    <span style="margin-right: 10px;">Selesai :</span>
                                                    <span>2024-03-25 13:20:00</span>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card card-flush">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="text-center">No</th>
                                        <th class="min-w-150px">NIS</th>
                                        <th class="min-w-300px">NAMA</th>
                                        <th class="min-w-200px">LINK TUGAS</th>
                                        <th class="min-w-100px">NILAI</th>
                                        <th class="min-w-300px">KOMENTAR</th>
                                        <th class="min-w-200px">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>19200447</td>
                                        <td>Achmad Fadli Muchtar</td>
                                        <td><button class="btn btn-bg-info btn-sm text-white">Link Tugas
                                                Siswa</button>
                                        </td>
                                        <td><input type="text" class="form-control form-control-sm "></td>
                                        <td>
                                            <textarea name="" id="" class="form-control form-control-sm"></textarea>
                                        </td>
                                        <td><button class="btn btn-bg-success btn-sm text-white">2024-06-17
                                                12:35:05</button></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td>19200448</td>
                                        <td>Andi Permana Suhendar</td>
                                        <td><button class="btn btn-bg-info btn-sm text-white">Link Tugas
                                                Siswa</button>
                                        </td>
                                        <td><input type="text" class="form-control form-control-sm "></td>
                                        <td>
                                            <textarea name="" id="" class="form-control form-control-sm"></textarea>
                                        </td>
                                        <td><button class="btn btn-bg-success btn-sm text-white">2024-06-17
                                                12:35:05</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2 d-md-block pt-5">
                    <a href="{{ route('teacher-assignments.index', $scheduleOfSubject->id) }}"
                        class="btn btn-outline btn-active-primary"><i class="bi bi-arrow-left-circle"></i>Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-AppLayout>
