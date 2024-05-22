<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Siswa
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
                                <a href="{{ route('students.index') }}" class="text-muted text-hover-primary">Siswa</a>
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
                                <x-SearchInput placeholder="Cari Siswa" />
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (count($students))
                            <div class="table-responsive fixed-actions-table">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                    <thead>
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="text-center">No</th>
                                            <th class="min-w-250px">Nama Siswa</th>
                                            <th class="min-w-250px">Status</th>
                                            <th class="min-w-250px">Email</th>
                                            <th class="min-w-250px">Kelas</th>
                                            <th class="min-w-250px">Tahun Pelajaran</th>
                                            <th class="min-w-250px">Nis</th>
                                            <th class="min-w-200px">Dibuat Pada</th>
                                            <th class="min-w-200px">Diubah Pada</th>
                                            <th class="min-w-200px">Dihapus Pada</th>
                                            <th class="min-w-100px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>{{ $student->deleted_at->diffForHumans() }}</td>
                                                <td>
                                                    <a href="#"
                                                        class="btn btn-sm btn-icon btn-active-light-primary"
                                                        data-kt-menu-trigger="click" data-kt-menu-placement="top-end">
                                                        <i class="bi bi-three-dots fs-3"></i>
                                                    </a>
                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                        data-kt-menu="true">
                                                        @can('students.restore')
                                                            <div class="menu-item px-3">
                                                                <form action="{{ route('students.restore', $student->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <a href="#" class="menu-link px-3"
                                                                        onclick="confirmPopup(this, 'Akan mengembalikan mata pelajaran ini')">Pulihkan</a>
                                                                </form>
                                                            </div>
                                                        @endcan
                                                        @can('students.delete')
                                                            <div class="menu-item px-3">
                                                                <form
                                                                    action="{{ route('students.force-delete', $student->id) }}"
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
                    {!! $students->appends($_GET)->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-AppLayout>
