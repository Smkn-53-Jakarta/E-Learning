<style>
    .image-input-placeholder {
        background-image: url('/assets/template/media/svg/files/blank-image.svg');
    }

    [data-bs-theme="dark"] .image-input-placeholder {
        background-image: url('/assets/template/media/svg/files/blank-image-dark.svg');
    }
</style>
<div class="image-input image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
    <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ FileHelper::getImage($image) }})">
    </div>
    <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
        data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Ganti Foto">
        <i class="bi bi-pencil-fill fs-7"><span class="path1"></span><span class="path2"></span></i>
        <input type="file" name="{{ $name }}" accept=".png, .jpg, .jpeg .webp" />
        <input type="hidden" hidden name="{{ $name }}" />
    </label>
    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Cancel Image">
        <i class="bi bi-x fs-2"></i>
    </span>
    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
        data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Hapus Foto">
        <i class="bi bi-x fs-2"></i>
    </span>
</div>
<div class="text-muted fs-7">
    hanya dapat mengupload gambar dengan format *.png, *.jpg dan *.jpeg (Maks 10 Mb)
</div>
