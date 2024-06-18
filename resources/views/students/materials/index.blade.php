<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Ruang Materi
                        </h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('student-dashboard.index') }}"
                                    class="text-muted text-hover-primary">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('student-schedule-of-subjects.index') }}"
                                    class="text-muted text-hover-primary">Jadwal
                                    Mata Pelajaran</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="" class="text-muted text-hover-primary">Ruang Materi</a>
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
                        {{-- @if (count($materials)) --}}
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="">Materi Tambahan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active:" aria-current="page" href="">Video Pembelajaran</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active:" aria-current="page" href="">Slide</a>
                            </li>
                        </ul>
                        <h1 class="my-6 text-uppercase">Web Programming</h1>
                        <hr class="bg-secondary" style="height: 2px; border: none;">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="text-center">No</th>
                                        <th class="min-w-400px">Judul Materi</th>
                                        <th class="min-w-300px">Deskripsi</th>
                                        <th class="min-w-250px">File</th>
                                        <th class="min-w-250px">History Update File</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    {{-- @foreach ($materials as $material) --}}
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                    {{-- @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end mt-5">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                        {{-- @else --}}
                        {{-- <x-DataNotFound /> --}}
                        {{-- @endif --}}
                    </div>
                </div>
                <div class="d-grid gap-2 d-md-block pt-5">
                    <a href="{{ route('student-schedule-of-subjects.index') }}"
                        class="btn btn-primary btn-active-primary"><i class="bi bi-arrow-left-circle"></i>Kembali</a>
                </div>
                {{-- <div class="d-flex p-5 justify-content-end">
                    {!! $materials->appends($_GET)->links() !!}
                </div> --}}
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                const tabs = document.querySelectorAll('.nav-link');
                tabs.forEach(tab => {
                    tab.addEventListener('click', function(event) {
                        event.preventDefault();

                        // Remove 'active' class from all tabs
                        tabs.forEach(t => t.classList.remove('active'));

                        // Add 'active' class to the clicked tab
                        this.classList.add('active');

                        // Hide all content
                        document.querySelectorAll('.tab-content').forEach(content => content.style
                            .display = 'none');

                        // Show content related to the clicked tab
                        const contentId = 'content' + this.id.slice(-1); // Extract number from tab id
                        document.getElementById(contentId).style.display = 'block';
                    });
                });
            });
        </script>
</x-AppLayout>
