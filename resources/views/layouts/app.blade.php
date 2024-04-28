<!DOCTYPE html>
<html lang="en">

<head>
    <base href="../" />
    <title>{{ config('app.name', 'E-Learning') }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    @stack('css')
    <link href="{{ asset('assets/template') }}/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/template') }}/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>


<style>
    .ck-content {
        color: #171717;
    }
</style>

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <script>
        var defaultThemeMode = "system";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <x-Partials.Navbar />
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <x-Partials.Sidebar />
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    {{ $slot }}
                </div>
                <x-Partials.Footer />
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/template') }}/plugins/global/plugins.bundle.js"></script>
    <script src="{{ asset('assets/template') }}/js/scripts.bundle.js"></script>
    <script src="https://kit.fontawesome.com/d797f1d3ce.js" crossorigin="anonymous"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function confirmPopup(button, text) {
            event.preventDefault();
            Swal.fire({
                title: 'Apa kamu yakin?',
                text,
                icon: "warning",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Yes!",
                cancelButtonText: 'No',
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: 'btn btn-danger'
                },
                reverseButtons: true
            }).then(function(result) {
                if (result.isConfirmed) {
                    $(button).closest("form").submit();
                }
            });
        }
    </script>
    @stack('scripts')
</body>

</html>
