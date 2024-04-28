<x-app-layout>
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="d-flex align-items-center">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <a href="{{ route('dataguru.index') }}"
                            class="text-muted text-hover-primary">{{ $preTitle ?? 'Data' }}</a>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <h1
                                class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                {{ $title ?? 'Guru App' }}
                            </h1>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- MIDDLE CONTENT --}}
        <div class="container p-5 m-5">
            <div class="content-wrapper">
                <div class="row gutters grid gap-3">

                    {{-- content 1 --}}
                    <div
                        class="col-lg-5 col-md-5 col-sm-12 rounded shadow-lg p-3 mb-5 border border-info-subtle py-5 my-5">
                        <div class="pricing-plan">
                            <div class="container position-relative">
                                <div class="container text-center">
                                    <img src="{{ asset('images/guru/gurulaki.png') }}"" class="card-img-top"
                                        alt="..." style="width:120px " height="120px">
                                </div>
                            </div>
                            <div class="container">
                                <div class="card-body py-5 my-5">
                                    <h5 class="styled"><i class="icon-user"></i> Kode Dosen : SSL</h5>
                                    <h5 class="styled"><i class="icon-local_library"></i> Kode MTK : 106</h5>
                                    <h5 class="styled"><i class="icon-confirmation_number"></i> SKS : 2</h5>
                                    <h5 class="styled"><i class="icon-address"></i> No Ruang : EL1-M2</h5>
                                    <h5 class="styled text-muted"><i class="icon-people_outline"></i> Kel Praktek :
                                    </h5>
                                    <h5 class="styled "><i class="icon-bookmarks"></i> Kode Gabung : KG.106.26.X</h5>
                                </div>
                            </div>
                            <div class="pricing-footer text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="#" class="btn btn-primary btn-lg">Masuk Kelas</a>
                                    <a href="#" type="button" class="btn btn-info" data-toggle="tooltip"
                                        data-placement="bottom" title="" data-original-title="View">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                    <a href="#" type="button" class="btn btn-info" data-toggle="tooltip"
                                        data-placement="bottom" title="" data-original-title="Edit">
                                        <i class="bi bi-pen-fill"></i>
                                    </a>
                                    <a href="#" type="button" class="btn btn-info" data-toggle="tooltip"
                                        data-placement="bottom" title="" data-original-title="">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- content 2 --}}
                    <div
                        class="col-lg-5 col-md-5 col-sm-12 rounded shadow-lg p-3 mb-5 border border-info-subtle py-5 my-5">
                        <div class="pricing-plan">
                            <div class="container position-relative">
                                <div class="container text-center">
                                    <img src="{{ asset('images/guru/gurucewe.png') }}"" class="card-img-top"
                                        alt="..." style="width:120px " height="120px">
                                </div>
                            </div>
                            <div class="container">
                                <div class="card-body py-5 my-5">
                                    <h5 class="styled"><i class="icon-user"></i> Kode Dosen : SSL</h5>
                                    <h5 class="styled"><i class="icon-local_library"></i> Kode MTK : 106</h5>
                                    <h5 class="styled"><i class="icon-confirmation_number"></i> SKS : 2</h5>
                                    <h5 class="styled"><i class="icon-address"></i> No Ruang : EL1-M2</h5>
                                    <h5 class="styled text-muted"><i class="icon-people_outline"></i> Kel Praktek :
                                    </h5>
                                    <h5 class="styled "><i class="icon-bookmarks"></i> Kode Gabung : KG.106.26.X</h5>
                                </div>
                            </div>
                            <div class="pricing-footer text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="#" class="btn btn-primary btn-lg">Masuk Kelas</a>
                                    <a href="#" type="button" class="btn btn-info" data-toggle="tooltip"
                                        data-placement="bottom" title="" data-original-title="View">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                    <a href="#" type="button" class="btn btn-info" data-toggle="tooltip"
                                        data-placement="bottom" title="" data-original-title="Edit">
                                        <i class="bi bi-pen-fill"></i>
                                    </a>
                                    <a href="#" type="button" class="btn btn-info" data-toggle="tooltip"
                                        data-placement="bottom" title="" data-original-title="Delete">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- content 3 --}}
                    <div
                        class="col-lg-5 col-md-5 col-sm-12 rounded shadow-lg p-3 mb-5 border border-info-subtle py-5 my-5">
                        <div class="pricing-plan">
                            <div class="container position-relative">
                                <div class="container text-center">
                                    <img src="{{ asset('images/guru/gurucewe.png') }}"" class="card-img-top"
                                        alt="..." style="width:120px " height="120px">
                                </div>
                            </div>
                            <div class="container">
                                <div class="card-body py-5 my-5 ">
                                    <h5 class="styled"><i class="icon-user"></i> Kode Dosen : SSL</h5>
                                    <h5 class="styled"><i class="icon-local_library"></i> Kode MTK : 106</h5>
                                    <h5 class="styled"><i class="icon-confirmation_number"></i> SKS : 2</h5>
                                    <h5 class="styled"><i class="icon-address"></i> No Ruang : EL1-M2</h5>
                                    <h5 class="styled text-muted"><i class="icon-people_outline"></i> Kel Praktek :
                                    </h5>
                                    <h5 class="styled "><i class="icon-bookmarks"></i> Kode Gabung : KG.106.26.X</h5>
                                </div>
                            </div>
                            <div class="pricing-footer text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="#" class="btn btn-primary btn-lg">Masuk Kelas</a>
                                    <a href="#" type="button" class="btn btn-info" data-toggle="tooltip"
                                        data-placement="bottom" title="" data-original-title="View">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                    <a href="#" type="button" class="btn btn-info" data-toggle="tooltip"
                                        data-placement="bottom" title="" data-original-title="Edit">
                                        <i class="bi bi-pen-fill"></i>
                                    </a>
                                    <a href="#" type="button" class="btn btn-info" data-toggle="tooltip"
                                        data-placement="bottom" title="" data-original-title="Delete">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
