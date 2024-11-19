@extends('layouts.guest')

@section('title', 'Forgot Password')

@section('content')
    <main class="auth">
        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src={{ url('/assets/img/logo.png') }} alt="">
                                </a>
                            </div>
                            <!-- End Logo -->

                            @include('components.danger-alert')
                            @include('components.success-alert')
                            @include('components.info-alert')

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>
                                        <p class="text-center small">Enter your password</p>
                                    </div>

                                    <form class="row g-3 needs-validation" method="POST"
                                        action="{{ route('password.update') }}" novalidate>
                                        
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $token }}">

                                        <div class="col-12">
                                            <label for="email" class="form-label">E-Mail</label>
                                            <div class="input-group has-validation">
                                                <input type="text" value="{{ $email }}" name="email"
                                                    class="form-control" disabled>
                                                <input type="hidden" id="email" name="email"
                                                    value="{{ $email }}" required>
                                                <div class="invalid-feedback">Please enter your email.</div>
                                            </div>
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="email" class="form-label">Password</label>
                                            <div class="input-group has-validation">
                                                <input type="password" name="password" class="form-control" id="password"
                                                    required>
                                                <div class="invalid-feedback">Please enter password.</div>
                                            </div>
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="email" class="form-label">Re-enter Password</label>
                                            <div class="input-group has-validation">
                                                <input type="password" name="password_confirmation" class="form-control"
                                                    id="password-confirmation" required>
                                                <div class="invalid-feedback">Please re-enter password.</div>
                                            </div>
                                            @error('password_confirmation')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Change Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <!-- End #main -->
@endsection
