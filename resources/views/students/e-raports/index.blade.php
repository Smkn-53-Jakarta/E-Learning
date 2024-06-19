<x-AppLayout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Raport
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
                                <a href="{{ route('student-raports.index') }}"
                                    class="text-muted text-hover-primary">Raport</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card-header d-flex justify-content-end">
                    <div class="mb-5">
                        <x-SaveButton><i class="bi bi-download fs-2 mx-2"></i>Export</x-SaveButton>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <div class="card card-flush">
                        <div class="card-header justify-content-center mt-20">
                            <h1>LAPORAN HASIL BELAJAR SISWA</h1>
                        </div>
                        <div class="card-body py-0">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr class="">
                                            <th class="min-w-400px fw-medium">
                                                <div class="d-flex flex-column">
                                                    <div class="row align-items-center mb-2">
                                                        <div class="d-flex align-items-center mb-2">
                                                            <div class="col-3">
                                                                <h5 class="mb-0 mr-2 fw-normal">Nama Peserta Didik</h5>
                                                            </div>
                                                            <div>
                                                                <span class="fw-bold">: John Doe</span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center mb-2">
                                                            <div class="col-3">
                                                                <h5 class="mb-0 mr-2 fw-normal">Nomor Induk</h5>
                                                            </div>
                                                            <div>
                                                                <span class="fw-bold">: 12345678</span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center mb-2">
                                                            <div class="col-3">
                                                                <h5 class="mb-0 mr-2 fw-normal">Nama Sekolah</h5>
                                                            </div>
                                                            <div>
                                                                <span class="fw-bold">: SMKN 53 Jakarta Barat</span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-start mb-2">
                                                            <div class="col-3">
                                                                <h5 class="mb-0 mr-2 fw-normal">Alamat
                                                                    Sekolah
                                                                </h5>
                                                            </div>
                                                            <div class="col-7">
                                                                <span class="fw-bold">: Jl. Rusun Flamboyan,
                                                                    RT.14/RW.10,
                                                                    Cengkareng Bar.,
                                                                    Kecamatan Cengkareng, Kota Jakarta Barat, Daerah
                                                                    Khusus
                                                                    Ibukota Jakarta 11730</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </th>
                                            <th class="min-w-350px fw-normal">
                                                <div class="d-flex flex-column">
                                                    <div class="row align-items-center mb-2">
                                                        <div class="d-flex align-items-center mb-2">
                                                            <div class="col-4">
                                                                <h5 class="mb-0 mr-2 fw-normal">Kelas</h5>
                                                            </div>
                                                            <div class="col-2">
                                                                <span>: </span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-start mb-2">
                                                            <div class="col-4">
                                                                <h5 class="mb-0 mr-2 fw-normal">Semester
                                                                </h5>
                                                            </div>
                                                            <div class="col-2">
                                                                <span class="fw-bold">: I (Satu)</span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-start mb-2">
                                                            <div class="col-4">
                                                                <h5 class="mb-0 mr-2 fw-normal">Tahun Pelajaran
                                                                </h5>
                                                            </div>
                                                            <div class="col-4">
                                                                <span class="fw-bold">: 2024/2026</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- card content 1 --}}
                        <div class="card-body py-0">
                            <div class="table-responsive">
                                <table class="table table-bordered border-dark">
                                    <tr class="text-center">
                                        <th class="align-middle" rowspan="2" style="width: 2%;">No</th>
                                        <th class="align-middle" rowspan="2">Nama Mata Pelajaran</th>
                                        <th class="col-1" rowspan="2">Kriteria Ketuntasan Minimal</th>
                                        <th colspan="3">Nilai</th>
                                    </tr>
                                    <tr class="text-center">
                                        <th class="col-1">Angka</th>
                                        <th class="col-2">huruf</th>
                                        <th>Keterangan</th>
                                    </tr>
                                    <tbody>
                                        <tr>
                                            <th class="fw-normal">1.</th>
                                            <th class="fw-normal">Web Program</th>
                                            <th class="text-center fw-normal">75</th>
                                            <th class="text-center fw-normal">80</th>
                                            <th class="text-center fw-normal">Delapan Puluh</th>
                                            <th class="text-center fw-normal">-</th>
                                        </tr>
                                        <tr>
                                            <th class="fw-normal">2.</th>
                                            <th class="fw-normal">Dasar Program</th>
                                            <th class="text-center fw-normal">75</th>
                                            <th class="text-center fw-normal">83</th>
                                            <th class="text-center fw-normal">Delapan Puluh Satu</th>
                                            <th class="text-center fw-normal">-</th>
                                        </tr>
                                        <tr>
                                            <th class="fw-normal">3.</th>
                                            <th class="fw-normal">Bahasa Indonesia</th>
                                            <th class="text-center fw-normal">75</th>
                                            <th class="text-center fw-normal">90</th>
                                            <th class="text-center fw-normal">Sembilan Puluh</th>
                                            <th class="text-center fw-normal">-</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- card content 2 --}}
                        <div class="card-body py-0">
                            <div class="table-responsive">
                                <table class="table table-bordered border-dark">
                                    <tr class="text-center">
                                        <th style="width: 2%;">No</th>
                                        <th class="min-w-130px" style="width: 30%;">Sikap dan Kepribadian</th>
                                        <th class="min-w-50px">Nilai</th>
                                        <th class="min-w-110px" style="width: 35%;">Ketidakhadiran</th>
                                        <th class="min-w-50px">Hari</th>
                                    </tr>
                                    <tbody>
                                        <tr>
                                            <th class="fw-normal">1.</th>
                                            <th class="fw-normal">Sikap</th>
                                            <th class="text-center fw-normal">-</th>
                                            <th class="text-start fw-normal">Izin</th>
                                            <th class="text-center fw-normal">-</th>
                                        </tr>
                                        <tr>
                                            <th class="fw-normal">2.</th>
                                            <th class="fw-normal">Kepribadian</th>
                                            <th class="text-center fw-normal">-</th>
                                            <th class="text-start fw-normal">Sakit</th>
                                            <th class="text-center fw-normal">-</th>
                                        </tr>
                                        <tr>
                                            <th class="fw-normal">3.</th>
                                            <th class="fw-normal">Kerajinan</th>
                                            <th class="text-center fw-normal">-</th>
                                            <th class="text-start fw-normal">Tanpa Keterangan</th>
                                            <th class="text-center fw-normal">-</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- card content 3 --}}
                        <div class="card-body py-0">
                            <div class="table-responsive">
                                <table class="table table-bordered border-dark">
                                    <tr class="text-center">
                                        <th style="width: 0.1%;">No</th>
                                        <th class="min-w-200px" style="width: 50%;">Ekstrakulikuler</th>
                                        <th class="min-w-50px" style="width:10%;">Nilai</th>
                                    </tr>
                                    <tbody>
                                        <tr>
                                            <th class="fw-normal">1.</th>
                                            <th class="fw-normal">Pramuka</th>
                                            <th class="text-center fw-normal">-</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- card content 4 --}}
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table table-bordered border-dark">
                                    <tbody>
                                        <tr class="">
                                            <th class="min-w-400px fw-medium">
                                                <div class="d-flex flex-column">
                                                    <div class="row align-items-center mb-2">
                                                        <div class="d-flex align-items-center mb-2">
                                                            <div class="col-3">
                                                                <h2 class="fw-bold">Catatan :</h2>
                                                                <p>Test Uji Coba</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- card footer --}}
                        <div class="card-body pb-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr class="">
                                        <th class="min-w-500px fw-medium">
                                            <div class="d-flex flex-column justify-content-center align-items-center"
                                                style="height: 200px">
                                                <div class="row mb-2 justify-content-center">
                                                    <div class="d-flex flex-column align-items-center">
                                                        <h5 class="mb-0 mr-2 fw-bold">Mengetahui:</h5>
                                                    </div>
                                                    <div class="d-flex flex-column align-items-center">
                                                        <h5 class="mb-0 mr-2 fw-bold">Orang tua/Wali,</h5>
                                                    </div>
                                                </div>
                                                <hr style="width: 40%; border: 1px solid black; margin-top: 100px;">
                                            </div>
                                        </th>
                                        <th class="min-w-500px fw-normal">
                                            <div class="d-flex flex-column justify-content-center align-items-center"
                                                style="height: 200px">
                                                <div class="row align-items-center mb-2 justify-content-center">
                                                    <div class="col-lg-14">
                                                        <h5 class="mb-0 mr-2 fw-normal">Jakarta, 17 Januari 2024
                                                        </h5>
                                                        <h5 class="col-6 mb-0 mr-2 fw-bold">Wali Kelas,</h5>
                                                    </div>
                                                </div>
                                                <hr style="width: 40%; border: 1px solid black; margin-top: 100px;">
                                            </div>
                                        </th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-AppLayout>
