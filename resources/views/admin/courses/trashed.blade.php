<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Mata Pelajaran
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
                                <a href="{{ route('courses.index') }}" class="text-muted text-hover-primary">Mata
                                    Pelajaran</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ url()->current() }}" class="text-muted text-hover-primary">Sampah</a>
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
                                <x-SearchInput placeholder="Cari Mata Pelajaran" />
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (count($courses))
                            <div class="table-responsive fixed-actions-table">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                    <thead>
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="text-center">No</th>
                                            <th class="min-w-250px">Nama Mata Pelajaran</th>
                                            <th class="min-w-200px">Dihapus</th>
                                            <th class="min-w-100px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach ($courses as $course)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $course->name }}</td>
                                                <td>{{ $course->deleted_at->diffForHumans() }}</td>
                                                <td>
                                                    <a href="#"
                                                        class="btn btn-sm btn-icon btn-active-light-primary"
                                                        data-kt-menu-trigger="click" data-kt-menu-placement="top-end">
                                                        <i class="bi bi-three-dots fs-3"></i>
                                                    </a>
                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                        data-kt-menu="true">
                                                        @can('courses.restore')
                                                            <div class="menu-item px-3">
                                                                <form action="{{ route('courses.restore', $course->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <a href="#" class="menu-link px-3"
                                                                        onclick="confirmPopup(this, 'Akan mengembalikan mata pelajaran ini')">Pulihkan</a>
                                                                </form>
                                                            </div>
                                                        @endcan
                                                        @can('courses.delete')
                                                            <div class="menu-item px-3">
                                                                <form
                                                                    action="{{ route('courses.force-delete', $course->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <a href="#" class="menu-link px-3"
                                                                        onclick="confirmPopup(this, 'Akan menghapus permanen mata pelajaran ini')">Hapus
                                                                        Permanen</a>
                                                                </form>
                                                            </div>
                                                        @endcan
                                                    </div>
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
                    {!! $courses->appends($_GET)->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-AppLayout>
