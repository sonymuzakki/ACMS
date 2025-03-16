<!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml" class="opacity-0" lang="en"><!-- BEGIN: Head -->
    <!-- Mirrored from tailwise-html.vercel.app/echo-dashboard-overview-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Aug 2024 07:42:07 GMT -->
    <!-- Added by HTTrack -->
    <meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="UTDQHUMnQs9GC9VYhC9EaF5Db5U3oNpH3LpUisuu">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Trust UC , Mobil bekas Padang , Toyota intercom">
        <meta name="author" content="Sony Muzakki">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title') </title>
        <!-- BEGIN: CSS Assets-->
        <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/vendors/litepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/vendors/tiny-slider.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/vendors/tippy.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/vendors/simplebar.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/themes/echo.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/vendors/highlight.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/themes/exort.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/vendors/tom-select.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/vendors/full-calendar.css') }}">
        <!-- END: CSS Assets-->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <!-- END: CSS Assets-->

        <style>
            /* Critical CSS inlined here */
            .body {
                font-family: 'Poppins', sans-serif;
            }
            .dataTables_wrapper .dataTables_empty {
                text-align: center;
                font-family: 'Poppins', sans-serif;
                font-size: 1.2em;
                color: #333;
                margin-top: 20px;
                margin-bottom: 20px;
                padding: 10px 0;
            }

            /* Select2 style css */
                .common-input-class {
                    disabled:bg-slate-100;
                    disabled:cursor-not-allowed;
                    dark:disabled:bg-darkmode-800/50;
                    dark:disabled:border-transparent;
                    [&[readonly]]:bg-slate-100;
                    [&[readonly]]:cursor-not-allowed;
                    [&[readonly]]:dark:bg-darkmode-800/50;
                    transition: duration-200 ease-in-out;
                    w-full;
                    text-sm;
                    border-slate-300;
                    shadow-sm;
                    rounded-md;
                    py-2 px-3 pr-8;
                    focus:ring-4;
                    focus:ring-primary;
                    focus:ring-opacity-20;
                    focus:border-primary;
                    focus:border-opacity-40;
                    dark:bg-darkmode-800;
                    dark:border-transparent;
                    dark:focus:ring-slate-700;
                    dark:focus:ring-opacity-10;
                    /* Tambahkan warna font di sini */
                    color: #E2E8F0; /* Ubah dengan warna yang Anda inginkan */
                }
                .select2-container {
                    width: 100% !important;
                }
                .select2-container--default .select2-selection--single {
                    height: 100%; /* Pastikan tinggi mengikuti kontainer */
                    padding: 0.75rem 1rem; /* Sesuaikan dengan padding pada input */
                    border: 1px solid #cbd5e0; /* Sesuaikan dengan input */
                    border-radius: 0.1rem; /* Sesuaikan dengan input */
                    background-color: #f8fafc; /* Sesuaikan dengan input */
                    box-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05); /* Sesuaikan dengan input */
                }
                .select2-container--default .select2-selection--single .select2-selection__arrow {
                    height: 100%;
                }
                .select2-container--default .select2-selection--single .select2-selection__clear {
                    margin-right: 0.3rem; /* Beri jarak antara icon clear dengan border */
                }
                .select2-container--default .select2-selection--single .select2-selection__rendered {
                    color: #474f5c; /* Sesuaikan dengan input */
                    padding: 0;
                    line-height: 0.75rem; /* Pastikan line-height sama */
                }
            /* end Select2 style css */

        </style>
        @stack('style')
    </head>
    <!-- END: Head -->
    <body>

        @include('master1.body.main')

        <!-- BEGIN: Vendor JS Assets-->
        <script src="{{ asset('dist/js/vendors/tom-select.js') }}"></script>
        <script src="{{ asset('dist/js/vendors/dom.js') }}"></script>
        <script src="{{ asset('dist/js/vendors/tailwind-merge.js') }}"></script>
        <script src="{{ asset('dist/js/vendors/lucide.js') }}"></script>
        <script src="{{ asset('dist/js/vendors/alert.js') }}"></script>
        <script src="{{ asset('dist/js/vendors/dayjs.js') }}"></script>
        <script src="{{ asset('dist/js/vendors/litepicker.js') }}"></script>
        <script src="{{ asset('dist/js/vendors/tiny-slider.js') }}"></script>
        <script src="{{ asset('dist/js/vendors/popper.js') }}"></script>
        <script src="{{ asset('dist/js/vendors/dropdown.js') }}"></script>
        <script src="{{ asset('dist/js/vendors/tippy.js') }}"></script>
        <script src="{{ asset('dist/js/vendors/simplebar.js') }}"></script>
        <script src="{{ asset('dist/js/vendors/transition.js') }}"></script>
        <script src="{{ asset('dist/js/vendors/chartjs.js') }}"></script>
        <script src="{{ asset('dist/js/vendors/modal.js') }}"></script>
        <script src="{{ asset('dist/js/components/base/theme-color.js') }}"></script>
        <script src="{{ asset('dist/js/components/base/lucide.js') }}"></script>
        <script src="{{ asset('dist/js/components/base/litepicker.js') }}"></script>
        <script src="{{ asset('dist/js/components/base/tiny-slider.js') }}"></script>
        <script src="{{ asset('dist/js/utils/colors.js') }}"></script>
        <script src="{{ asset('dist/js/utils/helper.js') }}"></script>
        <script src="{{ asset('dist/js/components/report-line-chart.js') }}"></script>
        <script src="{{ asset('dist/js/components/report-donut-chart-3.js') }}"></script>
        <script src="{{ asset('dist/js/components/base/tippy.js') }}"></script>
        <script src="{{ asset('dist/js/themes/echo.js') }}"></script>
        <script src="{{ asset('dist/js/components/quick-search.js') }}"></script>
        <script src="{{ asset('dist/js/vendors/highlight.js') }}"></script>
        <script src="{{ asset('dist/js/vendors/lucide.js') }}"></script>
        <script src="{{ asset('dist/js/components/base/source.js') }}"></script>
        <script src="{{ asset('dist/js/components/base/preview-component.js') }}"></script>
         <!-- END: Vendor JS Assets-->
        <!-- BEGIN: Pages, layouts, components JS Assets-->
        <!-- END: Pages, layouts, components JS Assets-->
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/datatables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        @stack('child-scripts')
    </body>

    <!-- Mirrored from tailwise-html.vercel.app/echo-dashboard-overview-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Aug 2024 07:42:17 GMT -->
</html>
