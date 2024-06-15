<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Jadwal Ekstrakurikuler
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
                                <a href="{{ route('extracurricular-schedules.index') }}"
                                    class="text-muted text-hover-primary">Jadwal Ekstrakurikuler</a>
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
                <div class="d-flex justify-content-between flex-column flex-lg-row w-100">
                    <x-SearchInput placeholder="Cari Jadwal Ekstrakurikuler" />
                </div>
                <div class="mt-2">
                    @if (session('message'))
                        <x-Alert :status="session('status')">{{ session('message') }}</x-Alert>
                    @endif
                </div>
                <div class="row mt-1">
                    @if (count($extracurricularSchedules))
                        @foreach ($extracurricularSchedules as $extracurricularSchedule)
                            <div class="col-lg-4 mt-4">
                                <x-ExtracurricularSchedules.CardWithAction :extracurricularSchedule="$extracurricularSchedule" />
                            </div>
                        @endforeach
                    @else
                        <x-DataNotFound />
                    @endif
                </div>
                <div class="d-flex p-5 justify-content-end">
                    {!! $extracurricularSchedules->appends($_GET)->links() !!}
                </div>
            </div>
        </div>
</x-AppLayout>
