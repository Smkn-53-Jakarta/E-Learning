<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Mapel bersangkutan
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
                                <a href="{{ route('attendances-students.index') }}"
                                    class="text-muted text-hover-primary">Rekap Siswa</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="" class="text-muted text-hover-primary">Kelas bersangkutan</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('attendances-students-attendances.index', 'mksksjwhwhwiw') }}"
                                    class="text-muted text-hover-primary">mapel bersangkutan</a>
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
                                        <th class="min-w-90px text-start">Nama Siswa</th>
                                        <th class="min-w-30px text-center">1</th>
                                        <th class="min-w-30px text-center">2</th>
                                        <th class="min-w-30px text-center">3</th>
                                        <th class="min-w-30px text-center">4</th>
                                        <th class="min-w-30px text-center">jml.hadir</th>
                                        <th class="min-w-30px text-center">jml.alpha</th>
                                        <th class="min-w-30px text-center">jml.izin</th>
                                        <th class="min-w-30px text-center">jml.sakit</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-start">Agus Bambang Pamungkas</td>
                                        <td class="text-center" style="position: relative;"><button type="button"
                                                class="btn btn-success d-flex align-items-center justify-content-center"
                                                style="width: 15px; height: 30px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">H</button>
                                        </td>
                                        <td class="text-center" style="position: relative;"><button type="button"
                                                class="btn btn-danger d-flex align-items-center justify-content-center"
                                                style="width: 15px; height: 30px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">A</button>
                                        </td>
                                        <td class="text-center" style="position: relative;"><button type="button"
                                                class="btn btn-primary d-flex align-items-center justify-content-center"
                                                style="width: 15px; height: 30px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">I</button>
                                        </td>
                                        <td class="text-center" style="position: relative;"><button type="button"
                                                class="btn btn-warning d-flex align-items-center justify-content-center"
                                                style="width: 15px; height: 30px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">S</button>
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
                        <div class="card-toolbar d-flex align-items-center position-relative my-1 pb-1">
                            <div class="col-7">
                                <a href="{{ route('attendances-students.show') }}"
                                    class=" col-md-auto btn btn-primary me-3"><i
                                        class="bi bi-arrow-left-circle"></i>Kembali</a>
                            </div>
                            <div class="col d-flex align-items-center position-relative">
                                <button
                                    class="btn btn-success text-center d-flex align-items-center justify-content-center m-1"
                                    style="width: 120px; height:30px; position: relative;">
                                    H : Hadir
                                </button>
                                <button
                                    class="btn btn-danger text-center d-flex align-items-center justify-content-center m-1"
                                    style="width: 120px; height:30px; position: relative;">
                                    A : Alpha
                                </button>
                                <button
                                    class="btn btn-primary text-center d-flex align-items-center justify-content-center m-1"
                                    style="width: 120px; height:30px; position: relative;">
                                    I : Izin
                                </button>
                                <button
                                    class="btn btn-warning text-center d-flex align-items-center justify-content-center m-1"
                                    style="width: 120px; height:30px; position: relative;">
                                    S : Sakit
                                </button>
                            </div>
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
