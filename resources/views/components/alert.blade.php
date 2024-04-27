@php
    switch ($status) {
        case 'success':
            $color = 'success';
            $title = 'Success';
            break;
        case 'info':
            $color = 'info';
            $title = 'Information';
            break;
        case 'warning':
            $color = 'warning';
            $title = 'Warning';
            break;
        default:
            $color = 'danger';
            $title = 'Failed';
            break;
    }
@endphp

<div class="alert alert-dismissible bg-{{ $color }} d-flex flex-column flex-sm-row p-5 mb-10">
    <i class="ki-duotone ki-search-list fs-2hx text-light me-4 mb-5 mb-sm-0"><span class="path1"></span><span
            class="path2"></span><span class="path3"></span></i>

    <div class="d-flex flex-column text-light pe-0 pe-sm-10">
        <h4 class="mb-2 light text-white">{{ $title }}</h4>

        <span>{{ $slot }}</span>
    </div>

    <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
        data-bs-dismiss="alert">
        <i class="ki-duotone ki-cross fs-1 text-light bi bi-x-lg"></i>
    </button>
</div>
