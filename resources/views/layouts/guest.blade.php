<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Cosec | @yield('title')</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href={{ url('/assets/img/favicon.png') }} rel="icon">
        <link href={{ url('/assets/img/apple-touch-icon.png') }} rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href={{ url('/assets/vendor/bootstrap/css/bootstrap.min.css') }} rel="stylesheet">
        <link href={{ url('/assets/vendor/bootstrap-icons/bootstrap-icons.css') }} rel="stylesheet">
        <link href={{ url('assets/vendor/boxicons/css/boxicons.min.css') }} rel="stylesheet">
        <link href={{ url('assets/vendor/quill/quill.snow.css') }} rel="stylesheet">
        <link href={{ url('/assets/vendor/quill/quill.bubble.css') }} rel="stylesheet">
        <link href={{ url('/assets/vendor/remixicon/remixicon.css') }} rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/vendor/izitoast/css/iziToast.css') }}">

        <!-- Template Main CSS File -->
        <link href={{ url('/assets/css/style.css') }} rel="stylesheet">
        <link href={{ url('/assets/css/custom.css') }} rel="stylesheet">
    </head>

    <body>

        <div>
            @yield('content')
        </div>
        <!-- End #main -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <!-- Disable console in browser -->
        <script>
            const isDebug = @json(env('APP_DEBUG'), false);
            if (!isDebug) {
                if (!window.console) window.console = {};
                var methods = ["log", "debug", "warn", "info", "error"];
                for (var i = 0; i < methods.length; i++) {
                    console[methods[i]] = function() {};
                }
            }
        </script>

        <!-- Vendor JS Files -->
        <script src={{ url('/assets/vendor/apexcharts/apexcharts.min.js') }}></script>
        <script src={{ url('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}></script>
        <script src={{ url('/assets/vendor/chart.js/chart.umd.js') }}></script>
        <script src={{ url('/assets/vendor/echarts/echarts.min.js') }}></script>
        <script src={{ url('/assets/vendor/quill/quill.min.js') }}></script>
        <script src="{{ asset('assets/vendor/izitoast/js/iziToast.js') }}"></script>

        <!-- Template Main JS File -->
        <script src={{ url('/assets/js/main.js') }}></script>

        @yield('script')

        @if (session()->has('toastMessage') && session()->has('toastStatus'))
            <script>
                @if (session('toastStatus') === 'success')
                    iziToast.success({
                        title: 'Success',
                        message: '{{ session('toastMessage') }}',
                        timeout: 7000,
                        position: 'topRight',
                    });
                @elseif (session('toastStatus') === 'error')
                    iziToast.error({
                        title: 'Error',
                        message: '{{ session('toastMessage') }}',
                        timeout: 7000,
                        position: 'topRight',
                    });
                @elseif (session('toastStatus') === 'info')
                    iziToast.info({
                        title: 'Info',
                        message: '{{ session('toastMessage') }}',
                        timeout: 7000,
                        position: 'topRight',
                    });
                @elseif (session('toastStatus') === 'warning')
                    iziToast.warning({
                        title: 'Warning',
                        message: '{{ session('toastMessage') }}',
                        timeout: 7000,
                        position: 'topRight',
                    });
                @endif
            </script>
        @endif

        @if (session('success'))
            <script>
                iziToast.success({
                    title: 'Success',
                    message: '{{ session('success') }}',
                    position: 'topRight'
                });
            </script>
        @endif
        @if (session('error'))
            <script>
                iziToast.error({
                    title: 'Error',
                    message: '{{ session('error') }}',
                    position: 'topRight'
                });
            </script>
        @endif
        @if (session('info'))
            <script>
                iziToast.info({
                    title: 'Info',
                    message: '{{ session('info') }}',
                    position: 'topRight'
                });
            </script>
        @endif
    </body>

</html>
