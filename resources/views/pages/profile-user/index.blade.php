@extends('layouts.dashboard')

@section('title', 'User Profile')

@section('content')
    <link rel="stylesheet" href="{{ url('/assets/css/user-profile/profile.css') }}">

    <main id="main" class="main">
        {{-- Header --}}
        <div class="card shadow">
            <div class="card-body">
                <div class="pagetitle">
                    <div>
                        <h1>User Profile</h1>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.index.show') }}">Dashboard</a></li>
                                <li class="breadcrumb-item">User profile</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        {{-- Body --}}
        <div class="card shadow">
            <div class="card-body">
                <div class="text-center mb-4">
                    <img src="{{ url('/assets/img/admin-default.jpg') }}" alt="Profile Picture" class="rounded-circle"
                        width="150" height="150">
                    <h3 class="mt-3">{{ $userDetails->name }}</h3>
                    <p class="text-muted">{{ $userDetails->email }}</p>
                </div>
                <hr>
                <form method="POST" action="{{ route('profileUser.update') }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- Personal Information Column -->
                        <div class="col-md-6">
                            <h5 class="mb-4 mt-4 text-uppercase" style="text-decoration: underline;">Personal Information
                            </h5>

                            <!-- Name Input -->
                            <div class="row mb-3">
                                <div class="col-md-2 d-flex align-items-center">
                                    <label for="name" class="form-label mb-0"><strong>Name:</strong></label>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $userDetails->name }}" required>
                                </div>
                            </div>

                            <!-- Email Input -->
                            <div class="row mb-3">
                                <div class="col-md-2 d-flex align-items-center">
                                    <label for="email" class="form-label mb-0"><strong>Email:</strong></label>
                                </div>
                                <div class="col-md-5">
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ $userDetails->email }}" required>
                                </div>
                            </div>
                        </div>

                        <!-- Account Settings Column -->
                        <div class="col-md-6">
                            <h5 class="mb-4 mt-4 text-uppercase" style="text-decoration: underline;">Account Settings</h5>

                            <!-- Password Input -->
                            <div class="row mb-3">
                                <div class="col-md-3 d-flex align-items-center">
                                    <label for="password" class="form-label mb-0"><strong>New Password:</strong></label>
                                </div>
                                <div class="col-md-7 position-relative">
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Enter new password (optional)">
                                        <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                            <i class="bi bi-eye-slash" id="eyeIcon"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Role -->
                            <div class="row mb-3">
                                <div class="col-md-3 d-flex align-items-center">
                                    <label for="role" class="form-label mb-0"><strong>Role:</strong></label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" id="role"
                                        value="{{ $userDetails->role }}" disabled>
                                </div>
                            </div>

                            <!-- Account Created -->
                            <div class="row mb-3">
                                <div class="col-md-3 d-flex align-items-center">
                                    <label for="created_at" class="form-label mb-0"><strong>Account
                                            Created:</strong></label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" id="created_at"
                                        value="{{ $userDetails->formatted_created_at }}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Footer --}}
        <div class="card shadow">
            <div class="card-body">
                <footer>
                    <div class="footer-copyright">
                        <h6>&#169 2024 Event Tech. All right reserved</h6>
                    </div>
                </footer>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script src="{{ url('/assets/js/user-profile/profile.js') }}"></script>
@endsection
