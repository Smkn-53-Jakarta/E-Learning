<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Jadwal Mata Pelajaran
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
                                <a href="{{ route('scheduleofsubjects.index') }}"
                                    class="text-muted text-hover-primary">Jadwal Mata Pelajaran</a>
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
                                <x-SearchInput placeholder="Cari Jadwal Mata Pelajaran" />
                            </div>
                        </div>
                        <div class="card-toolbar">
                            {{-- @if ($scheduleofsubjectsTrashed)
                                <a href="{{ route('scheduleofsubjects.trashed') }}" class="btn btn-light-primary me-3">
                                    <i class="fa-solid fa-trash-can"></i>
                                    Sampah
                                </a>
                            @endif --}}
                            @can('scheduleofsubjects.create')
                                <x-AddButton :url="route('scheduleofsubjects.create')">Tambah Guru</x-AddButton>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="card border m-5 border-white" style="width: 20rem;">
                                    <div class="pricing-header secondary p-2 rounded " style="text-align: center">
                                        <h6 class=" pricing-title">BAHASA INDONESIA</h6>

                                        <div class="pricing-save">Senin - 13:20 - 15:00</div>
                                    </div>
                                    <img src="{{ asset('images/guru/gurucewe.png') }}"
                                        class="card-img-top mx-auto d-block pt-3" style="width:90px" alt="...">
                                    <div class="card-body p-5">
                                        <h5 class="styled"><i class="icon-user"></i> Guru : Kharisma Audina</h5>
                                        <h5 class="styled"><i class="icon-local_library"></i> Kelas : XI TKJ 1</h5>
                                        <div class="pricing-footer">
                                            <div class="btn-group w-100" role="group" aria-label="Basic example">
                                                <a href="" type="button" class="btn btn-secondary"
                                                    data-toggle="tooltip" data-placement="bottom" title=""
                                                    data-original-title="Edit">
                                                    <i class="bi bi-pen-fill fs-4 text-info"></i>
                                                </a>
                                                <a href="" type="button" class="btn btn-secondary"
                                                    data-toggle="tooltip" data-placement="bottom" title=""
                                                    data-original-title="Detail">
                                                    <i class="bi bi-file-text-fill fs-4 text-success"></i>
                                                </a>
                                                <a href="" type="button" class="btn btn-secondary"
                                                    data-toggle="tooltip" data-placement="bottom" title=""
                                                    data-original-title="Hapus">
                                                    <i class="bi bi-trash-fill fs-4 text-danger"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card border m-5 border-white" style="width: 20rem;">
                                    <div class="pricing-header secondary p-2 rounded " style="text-align: center">
                                        <h6 class=" pricing-title">BAHASA INDONESIA</h6>

                                        <div class="pricing-save">Senin - 13:20 - 15:00</div>
                                    </div>
                                    <img src="{{ asset('images/guru/gurulaki.png') }}"
                                        class="card-img-top mx-auto d-block pt-3" style="width:90px" alt="...">
                                    <div class="card-body p-5">
                                        <h5 class="styled"><i class="icon-user"></i> Guru : Kharisma Audina</h5>
                                        <h5 class="styled"><i class="icon-local_library"></i> Kelas : XI TKJ 1</h5>
                                        <div class="pricing-footer">
                                            <div class="btn-group w-100" role="group" aria-label="Basic example">
                                                <a href="" type="button" class="btn btn-secondary"
                                                    data-toggle="tooltip" data-placement="bottom" title=""
                                                    data-original-title="Edit">
                                                    <i class="bi bi-pen-fill fs-4 text-info"></i>
                                                </a>
                                                <a href="" type="button" class="btn btn-secondary"
                                                    data-toggle="tooltip" data-placement="bottom" title=""
                                                    data-original-title="Detail">
                                                    <i class="bi bi-file-text-fill fs-4 text-success"></i>
                                                </a>
                                                <a href="" type="button" class="btn btn-secondary"
                                                    data-toggle="tooltip" data-placement="bottom" title=""
                                                    data-original-title="Hapus">
                                                    <i class="bi bi-trash-fill fs-4 text-danger"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card border m-5 border-white" style="width: 20rem;">
                                    <div class="pricing-header secondary p-2 rounded " style="text-align: center">
                                        <h6 class=" pricing-title">BAHASA INDONESIA</h6>

                                        <div class="pricing-save">Senin - 13:20 - 15:00</div>
                                    </div>
                                    <img src="{{ asset('images/guru/gurucewe.png') }}"
                                        class="card-img-top mx-auto d-block pt-3" style="width:90px" alt="...">
                                    <div class="card-body p-5">
                                        <h5 class="styled"><i class="icon-user"></i> Guru : Kharisma Audina</h5>
                                        <h5 class="styled"><i class="icon-local_library"></i> Kelas : XI TKJ 1</h5>
                                        <div class="pricing-footer">
                                            <div class="btn-group w-100" role="group" aria-label="Basic example">
                                                <a href="" type="button" class="btn btn-secondary"
                                                    data-toggle="tooltip" data-placement="bottom" title=""
                                                    data-original-title="Edit">
                                                    <i class="bi bi-pen-fill fs-4 text-info"></i>
                                                </a>
                                                <a href="" type="button" class="btn btn-secondary"
                                                    data-toggle="tooltip" data-placement="bottom" title=""
                                                    data-original-title="Detail">
                                                    <i class="bi bi-file-text-fill fs-4 text-success"></i>
                                                </a>
                                                <a href="" type="button" class="btn btn-secondary"
                                                    data-toggle="tooltip" data-placement="bottom" title=""
                                                    data-original-title="Hapus">
                                                    <i class="bi bi-trash-fill fs-4 text-danger"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card border m-5 border-white" style="width: 20rem;">
                                    <div class="pricing-header secondary p-2 rounded " style="text-align: center">
                                        <h6 class=" pricing-title">BAHASA INDONESIA</h6>

                                        <div class="pricing-save">Senin - 13:20 - 15:00</div>
                                    </div>
                                    <img src="{{ asset('images/guru/gurulaki.png') }}"
                                        class="card-img-top mx-auto d-block pt-3" style="width:90px" alt="...">
                                    <div class="card-body p-5">
                                        <h5 class="styled"><i class="icon-user"></i> Guru : Kharisma Audina</h5>
                                        <h5 class="styled"><i class="icon-local_library"></i> Kelas : XI TKJ 1</h5>
                                        <div class="pricing-footer">
                                            <div class="btn-group w-100" role="group" aria-label="Basic example">
                                                <a href="" type="button" class="btn btn-secondary"
                                                    data-toggle="tooltip" data-placement="bottom" title=""
                                                    data-original-title="Edit">
                                                    <i class="bi bi-pen-fill fs-4 text-info"></i>
                                                </a>
                                                <a href="" type="button" class="btn btn-secondary"
                                                    data-toggle="tooltip" data-placement="bottom" title=""
                                                    data-original-title="Detail">
                                                    <i class="bi bi-file-text-fill fs-4 text-success"></i>
                                                </a>
                                                <a href="" type="button" class="btn btn-secondary"
                                                    data-toggle="tooltip" data-placement="bottom" title=""
                                                    data-original-title="Hapus">
                                                    <i class="bi bi-trash-fill fs-4 text-danger"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="d-flex p-5 justify-content-end">
                        {!! $scheduleofsubjects->links() !!}
                    </div> --}}
                </div>
            </div>
        </div>
</x-AppLayout>
