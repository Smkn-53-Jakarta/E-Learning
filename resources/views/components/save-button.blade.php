<button type="submit" class="btn btn-primary" id="{{ $id }}">
    {{ $slot }}
</button>
@push('scripts')
    <script>
        $(document).ready(function() {
            let form = $('#{{ $id }}').closest("form");

            $(form).on('submit', function(event) {
                let saveButton = $(this).find("#{{ $id }}");

                saveButton.html(`
                <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                <span class="text-white" role="status"> Loading...</span>`);

                saveButton.prop("disabled", true);
            });
        });
    </script>
@endpush
