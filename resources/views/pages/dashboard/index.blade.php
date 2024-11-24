@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <link rel="stylesheet" href="{{ url('/assets/css/dashboard.css') }}">

    {{-- Header --}}
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                </ol>
            </nav>
        </div>

        {{-- Body --}}
        <div class="row mt-1">
            <div class="col-md-12">
                {{-- Body --}}
                <div class="row mt-3">
                    <!-- Total Assets -->
                    <div class="col-md-3">
                        <div class="card text-center shadow totalAssets">
                            <div class="card-body">
                                <h5 class="card-title total">Total Assets</h5>
                                <p class="card-text fs-3" id="totalAssets">0</p>
                            </div>
                        </div>
                    </div>

                    <!-- Total Laptops -->
                    <div class="col-md-3">
                        <div class="card text-center shadow totalLaptops">
                            <div class="card-body">
                                <h5 class="card-title total">Total Laptops</h5>
                                <p class="card-text fs-3" id="totalLaptops">0</p>
                            </div>
                        </div>
                    </div>

                    <!-- Total Desktops -->
                    <div class="col-md-3">
                        <div class="card text-center shadow totalDesktops">
                            <div class="card-body">
                                <h5 class="card-title total">Total Desktops</h5>
                                <p class="card-text fs-3" id="totalDesktops">0</p>
                            </div>
                        </div>
                    </div>

                    <!-- Total Users -->
                    <div class="col-md-3">
                        <div class="card text-center shadow totalUsers">
                            <div class="card-body">
                                <h5 class="card-title total">Total Users</h5>
                                <p class="card-text fs-3" id="totalUsers">0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-1">
            <!-- Left Section (Auto Height) -->
            <div class="col-md-7">
                <div class="d-flex flex-column">
                    <div class="card">
                        <div class="card-body">
                            <!-- Content for the left section -->
                            <h5 class="card-title fw-bold">Users</h5>

                            <div class="table-responsive">
                                <table class="table table-borderless align-middle">
                                    <thead>
                                        <tr>
                                            <th style="border-right: 1px solid #ddd;">Name</th>
                                            <th style="border-right: 1px solid #ddd;">Email</th>
                                            <th style="border-right: 1px solid #ddd;">Role</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($userList as $user)
                                            <tr>
                                                <td style="border-right: 1px solid #ddd;">{{ $user->name }}</td>
                                                <td style="border-right: 1px solid #ddd;">{{ $user->email }}</td>
                                                <td style="border-right: 1px solid #ddd;">{{ $user->role }}</td>
                                                <td>{{ \Carbon\Carbon::parse($user->created_at)->locale('en')->format('d F Y') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Section (Two Cards Stacked Vertically) -->
            <div class="col-md-5">
                <div class="d-flex flex-column h-100">
                    <!-- Top Card (Laptop) -->
                    <div class="card mb-3 flex-grow-1">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Laptop</h5>
                            <div class="row">
                                @foreach ($laptopList as $laptop)
                                    <div class="col-md-6 mt-2">
                                        <strong>{{ $loop->iteration }}. </strong><strong>Computer Name:</strong>
                                        {{ $laptop->computer_name }}
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <strong>Serial Number:</strong> {{ $laptop->serial_number }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Bottom Card (Desktop) -->
                    <div class="card flex-grow-1">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Desktop</h5>
                            <div class="row">
                                @foreach ($desktopList as $desktop)
                                    <div class="col-md-6 mt-2">
                                        <strong>{{ $loop->iteration }}. </strong><strong>Computer Name:</strong>{{ $desktop->computer_name }}
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <strong>Serial Number:</strong> {{ $desktop->serial_number }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Footer --}}
        <div class="card">
            <div class="card-body">
                <footer>
                    <div class="footer-copyright">
                        <h6>
                            &#169 2024 Aspiro Sdn Bhd. All rights reserved
                        </h6>
                    </div>
                </footer>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script src="{{ url('/assets/js/dashboard.js') }}"></script>
@endsection
