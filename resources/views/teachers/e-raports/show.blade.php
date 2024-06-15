<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Nama Mapel
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
                                <a href="{{ route('teacher-raports.index') }}"
                                    class="text-muted text-hover-primary">Raport</a>
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
                @if (session('message'))
                    <x-Alert :status="session('status')">{{ session('message') }}</x-Alert>
                @endif
                <div class="card card-flush">
                    <div class="card-body">
                        <div class="mb-5">
                            <x-SaveButton>Simpan</x-SaveButton>
                        </div>
                        {{-- @if (count($materials)) --}}
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="text-center">No</th>
                                        <th class="min-w-400px">Nama Siswa</th>
                                        <th class="min-w-150px">NIS</th>
                                        <th class="min-w-80px">Nilai UTS</th>
                                        <th class="min-w-80px">Nilai UAS</th>
                                        <th class="min-w-300px">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    {{-- @foreach ($raports as $raport) --}}
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>Ahmad Faldi</td>
                                        <td>19200447</td>
                                        <td><input type="text" class="form-control form-control-sm "
                                                style="width: 80px"></td>
                                        <td><input type="text" class="form-control form-control-sm "
                                                style="width: 80px"></td>
                                        <td>
                                            <textarea name="" id="" class="form-control form-control-sm"></textarea>
                                        </td>
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
                <div class="d-grid gap-2 d-md-block pt-5">
                    <a href="{{ route('teacher-raports.index') }}" class="btn btn-outline btn-active-primary"><i
                            class="bi bi-arrow-left-circle"></i>Kembali</a>
                </div>
            </div>
        </div>
</x-AppLayout>
