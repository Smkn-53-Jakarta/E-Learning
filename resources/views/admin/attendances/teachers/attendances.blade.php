<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Name Teacher (NIP)
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
                                <a href="{{ route('attendances-teachers.index') }}"
                                    class="text-muted text-hover-primary">Rekap Guru</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('attendances-teachers.show', 'Guru-Atikah') }}"
                                    class="text-muted text-hover-primary">Guru bersangkutan</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('attendances-teachers-attendances.index', 'Guru-Atikah') }}"
                                    class="text-muted text-hover-primary">Kehadiran</a>
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
                <div class="card card-flush">
                    <div class="card-header mt-6">
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative my-1 me-5">
                                <h3>Periode Juni</h3>
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
                        <div class="table-responsive fixed-actions-table">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="text-center">No</th>
                                        <th class="min-w-90px text-start">Nama Kelas</th>
                                        <th class="min-w-200px text-start">Mata Pelajaran</th>
                                        <th class="min-w-80px text-center">Tanggal</th>
                                        <th class="min-w-100px text-center">Jam Mulai</th>
                                        <th class="min-w-100px text-center">Jam Selesai</th>
                                        <th class="min-w-50px text-center">Pertemuan</th>
                                        <th class="min-w-80px text-center">Ket.</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-start">XII-TKJ</td>
                                        <td class="text-start">Matematika</td>
                                        <td class="text-center">27-08-2024</td>
                                        <td class="text-center">07.00</td>
                                        <td class="text-center">09.00</td>
                                        <td class="text-center">1</td>
                                        <td class="text-center">
                                            <button class="btn btn-success">Hadir</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td class="text-start">XII-TKJ</td>
                                        <td class="text-start">Bahasa Indonesia</td>
                                        <td class="text-center">27-08-2024</td>
                                        <td class="text-center">07.00</td>
                                        <td class="text-center">09.00</td>
                                        <td class="text-center">1</td>
                                        <td class="text-center">
                                            <button class="btn btn-danger">Tidak Hadir</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td class="text-start">XII-TKJ</td>
                                        <td class="text-start">Bahasa Inggris</td>
                                        <td class="text-center">27-08-2024</td>
                                        <td class="text-center">07.00</td>
                                        <td class="text-center">09.00</td>
                                        <td class="text-center">1</td>
                                        <td class="text-center">
                                            <button class="btn btn-success">Hadir</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">4</td>
                                        <td class="text-start">XII-TKJ</td>
                                        <td class="text-start">Bahasa Inggris</td>
                                        <td class="text-center">27-08-2024</td>
                                        <td class="text-center">07.00</td>
                                        <td class="text-center">09.00</td>
                                        <td class="text-center">1</td>
                                        <td class="text-center">
                                            <button class="btn btn-warning">Izin</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card card-footer">
                    <div class="row">
                        <div class="d-grid gap-2 d-md-block pt-3">
                            <a href="{{ route('attendances-teachers.show', 'slskkksqmmmmkw') }}"
                                class="btn btn-primary me-3"><i class="bi bi-arrow-left-circle"></i>Kembali</a>
                        </div>
                    </div>
                </div>
                {{-- <div class="d-flex p-5 justify-content-end">
                        {!! $attendances->links() !!}
                    </div> --}}
            </div>
        </div>
    </div>
</x-AppLayout>
