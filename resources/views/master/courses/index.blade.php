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
                                <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('courses.index') }}" class="text-muted text-hover-primary">Mata
                                    Pelajaran</a>
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
                                <form action="{{ url()->current() }}"
                                    class="d-flex align-items-center position-relative my-1">
                                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                                rx="1" transform="rotate(45 17.0365 15.1223)"
                                                fill="currentColor" />
                                            <path
                                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <input type="text" data-kt-user-table-filter="search" name="search"
                                        value="{{ request()->search }}"
                                        class="form-control form-control-solid w-250px ps-14"
                                        placeholder="Cari Mata Pelajaran" />
                                </form>
                            </div>
                        </div>
                        <div class="card-toolbar">
                            @if ($coursesTrashed)
                                <a href="{{ route('courses.trashed') }}" class="btn btn-light-primary me-3">
                                    <i class="fa-solid fa-trash-can"></i>
                                    Sampah
                                </a>
                            @endif
                            @can('courses.create')
                                <a href="{{ route('courses.create') }}" class="btn btn-light-primary">
                                    <span class="svg-icon svg-icon-3">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5"
                                                fill="currentColor" />
                                            <rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                                                transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
                                            <rect x="6.01041" y="10.9247" width="12" height="2" rx="1"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    Tambah Mata Pelajaran
                                </a>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        @if (count($courses))
                            <div class="table-responsive fixed-actions-table">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                    <thead>
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="text-center">No</th>
                                            <th class="min-w-250px">Nama</th>
                                            <th class="min-w-100px">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach ($courses as $course)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $course->name }}</td>
                                                <td>
                                                    <a href="#"
                                                        class="btn btn-sm btn-icon btn-active-light-primary"
                                                        data-kt-menu-trigger="click" data-kt-menu-placement="top-end">
                                                        <i class="bi bi-three-dots fs-3"></i>
                                                    </a>
                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                        data-kt-menu="true">
                                                        <div class="menu-item px-3">
                                                            <a href="{{ route('courses.edit', $course->id) }}"
                                                                class="menu-link px-3">Ubah</a>
                                                        </div>
                                                        <div class="menu-item px-3">
                                                            <form action="{{ route('courses.destroy', $course->id) }}"
                                                                method="post" class="me-3">
                                                                @csrf
                                                                @method('DELETE')
                                                                <a href="#" class="menu-link px-3"
                                                                    onclick="confirmPopup(this, 'Akan menghapus mata pelajaran ini')">Hapus</a>
                                                            </form>
                                                        </div>
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
                    {!! $courses->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-AppLayout>
