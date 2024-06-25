<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Ruang Penilaian
                        </h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('coach-dashboard.index') }}"
                                    class="text-muted text-hover-primary">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ url()->current() }}" class="text-muted text-hover-primary">Penilaian</a>
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
                        @if (count($extracurriculars))
                            <div class="table-responsive fixed-actions-table">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                    <thead>
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="text-center">No</th>
                                            <th class="min-w-250px">Nama Ekstrakurikuler</th>
                                            <th class="min-w-100px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach ($extracurriculars as $extracurricular)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $extracurricular->name }}</td>
                                                <td class="text-start">
                                                    <a href="{{ route('coach-extracurricular-assesment.show', $extracurricular->id) }}"
                                                        class="btn btn-light-primary btn-sm">Penilaian</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <x-DataNotFound />
                        @endif
                    </div>
                </div>
                <div class="d-flex p-5 justify-content-end">
                    {!! $extracurriculars->appends($_GET)->links() !!}
                </div>
            </div>
        </div>
</x-AppLayout>
