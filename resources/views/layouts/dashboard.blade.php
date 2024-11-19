<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>@yield('title')</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href={{ url('/assets/img/icon-event-tech.png') }} rel="icon">

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
        <link href={{ url('assets/vendor/izitoast/css/iziToast.css') }} rel="stylesheet">
        <link href={{ url('/assets/vendor/DataTables/datatables.min.css') }} rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.5/dist/quill.snow.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.3/dragula.min.css" rel="stylesheet" />


        <script src="https://code.iconify.design/iconify-icon/2.0.0/iconify-icon.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.umd.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.5/dist/quill.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.3/dragula.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
        <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/bootstrap5@6.1.11/index.global.min.js"></script>

        {{-- ADD BY ZUL --}}
        <!-- Bootstrap Selectpicker CSS -->
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css">

        <!-- DataTables CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

        @livewireStyles

        <!-- Template Main CSS File -->
        <link href={{ url('/assets/css/style.css') }} rel="stylesheet">
        <link href={{ url('/assets/css/custom.css') }} rel="stylesheet">

        @yield('head')

        @stack('head')
    </head>

    <body>
        <div>
            <!-- ======= Header ======= -->
            <header id="header" class="header fixed-top d-flex align-items-center">
                <div class="d-flex">
                    <!-- Sidebar Logo Container -->
                    <a href="#" class="logo d-flex logo-container">
                        <img src="{{ url('/assets/img/event-tech-logo.png') }}" class="dashboard-logo"
                            style="width: auto; height: 50px;" />
                    </a>

                    <!-- Sidebar Toggle Button -->
                    <i class="bi bi-list toggle-sidebar-btn" id="sidebarToggle"></i>
                </div>
                <!-- End Logo -->

                <nav class="header-nav ms-auto">
                    <ul class="d-flex align-items-center">
                        @livewire('notification.index')
                        @livewire('message.index')

                        <li class="nav-item dropdown pe-3">
                            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                                data-bs-toggle="dropdown">
                                @if (Auth()->user()->role == 'super_admin')
                                    <img src={{ url('/assets/img/admin-default.jpg') }} alt="Profile"
                                        class="rounded-circle" />
                                @else
                                    <img src={{ url('/assets/img/user-default.jpg') }} alt="Profile"
                                        class="rounded-circle" style="width: 43px; height: 60px;" />
                                @endif

                                <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth()->user()->name }}</span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                                <li class="dropdown-header">
                                    @if (Auth()->user()->role == 'super_admin')
                                        <img src="{{ url('./assets/img/admin-default.jpg') }}" alt="Profile"
                                            class="rounded-circle mb-2" style="width: 60px; height: 60px;" />
                                    @else
                                        <img src="{{ url('./assets/img/user-default.jpg') }}" alt="Profile"
                                            class="rounded-circle mb-2" style="width: 75px; height: 70px;" />
                                    @endif

                                    <h6>{{ Auth()->user()->name }}</h6>
                                    <span
                                        class="text-capitalize">{{ str_replace('_', ' ', Auth()->user()->role) }}</span>
                                </li>

                                <li>
                                    <hr class="dropdown-divider" />
                                </li>

                                <li>
                                    <a class="dropdown-item d-flex align-items-center"
                                        href="{{ route('profileUser.index.show') }}">
                                        <i class="bi bi-person"></i>
                                        <span>My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>

                                <li>
                                    <a class="dropdown-item d-flex align-items-center"
                                        href="{{ route('user.logout') }}"
                                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right"></i>
                                        <span>Sign Out</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </header>

            <!-- ======= Sidebar ======= -->
            @include('components.sidebar')
            <!-- End Sidebar-->

            @yield('content')

            <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                    class="bi bi-arrow-up-short"></i></a>
        </div>

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

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
        <script src="{{ asset('assets/vendor/DataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/sortable/Sortable.min.js') }}"></script>

        <!-- Initialize Choices JS -->
        <script>
            const choicesElementTags = document.querySelector('.choices-select-tags-multiple');
            if (choicesElementTags) {
                const choicesIntances = new Choices(choicesElementTags, {
                    allowHTML: true,
                    removeItemButton: true,
                    duplicateItemsAllowed: false,
                    placeholderValue: choicesElementTags.getAttribute('placeholder') || null,
                });
            }
        </script>

        @livewireScripts

        <!-- Template Main JS File -->
        <script src={{ url('/assets/js/main.js') }}></script>

        @yield('script')

        @stack('script')

        @if (session()->has('toastMessage') && session()->has('toastStatus'))
            <script>
                @if (session('toastStatus') === 'success')
                    iziToast.success({
                        title: 'Success',
                        message: '{{ session('toastMessage') }}',
                        timeout: 2000,
                        position: 'topRight',
                    });
                @elseif (session('toastStatus') === 'error')
                    iziToast.error({
                        title: 'Error',
                        message: '{{ session('toastMessage') }}',
                        timeout: 2000,
                        position: 'topRight',
                    });
                @elseif (session('toastStatus') === 'info')
                    iziToast.info({
                        title: 'Info',
                        message: '{{ session('toastMessage') }}',
                        timeout: 2000,
                        position: 'topRight',
                    });
                @elseif (session('toastStatus') === 'warning')
                    iziToast.warning({
                        title: 'Warning',
                        message: '{{ session('toastMessage') }}',
                        timeout: 2000,
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

        <script>
            document.addEventListener('livewire:initialized', () => {
                Livewire.on('toast', ([status, message]) => {
                    if (status === 'success') {
                        iziToast.success({
                            title: 'Success',
                            message: message,
                            timeout: 2000,
                            position: 'topRight',
                        });
                    } else if (status === 'error') {
                        iziToast.error({
                            title: 'Error',
                            message: message,
                            timeout: 2000,
                            position: 'topRight',
                        });
                    } else if (status === 'info') {
                        iziToast.info({
                            title: 'Info',
                            message: message,
                            timeout: 2000,
                            position: 'topRight',
                        });
                    } else if (status === 'warning') {
                        iziToast.warning({
                            title: 'Warning',
                            message: message,
                            timeout: 2000,
                            position: 'topRight',
                        });
                    }
                });
            });
        </script>

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

        <!-- Bootstrap Selectpicker JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
    </body>

</html>
