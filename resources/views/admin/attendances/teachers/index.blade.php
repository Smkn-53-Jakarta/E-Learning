<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Rekap Guru
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
                                <x-SearchInput placeholder="Cari Rekap Absensi Guru" />
                            </div>
                        </div>
                        <div class="card-toolbar">
                            <div class="d-grid gap-2 d-md-block">
                                <a href="#" class="btn btn-light-primary me-3">Generate</a>
                                <a href="#" class="btn btn-light-primary me-3"><i
                                        class="bi bi-filter"></i>Filter</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="pb-1">Periode Juni</h3>
                        <div class="table-responsive fixed-actions-table">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="text-center">No</th>
                                        <th class="min-w-250px">Nama Guru</th>
                                        <th class="min-w-200px">Mata Pelajaran</th>
                                        <th class="min-w-50px">Kelas 10</th>
                                        <th class="min-w-50px">Kelas 11</th>
                                        <th class="min-w-50px">Kelas 12</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>Atikah</td>
                                        <td>-</td>
                                        <td><a href="#" class="btn btn-light-primary btn-sm">Detail</a></td>
                                        <td><a href="#" class="btn btn-light-primary btn-sm">Detail</a></td>
                                        <td><a href="#" class="btn btn-light-primary btn-sm">Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td>Rahmat</td>
                                        <td>-</td>
                                        <td><a href="#" class="btn btn-light-primary btn-sm">Detail</a></td>
                                        <td><a href="#" class="btn btn-light-primary btn-sm">Detail</a></td>
                                        <td><a href="#" class="btn btn-light-primary btn-sm">Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td>Ridwan</td>
                                        <td>-</td>
                                        <td><a href="#" class="btn btn-light-primary btn-sm">Detail</a></td>
                                        <td><a href="#" class="btn btn-light-primary btn-sm">Detail</a></td>
                                        <td><a href="#" class="btn btn-light-primary btn-sm">Detail</a></td>
                                    </tr>
                                </tbody>
                            </table>
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
