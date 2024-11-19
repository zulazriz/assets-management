@extends('layouts.guest')

@section('title', 'Login')

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

                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                        <p class="text-center small">Enter your username & password to login</p>
                                    </div>
                                    <form class="row g-3 needs-validation" method="POST"
                                        action="{{ route('auth.login.post') }}" novalidate>
                                        @csrf

                                        <div class="col-12">
                                            <label for="email" class="form-label">E-Mail</label>
                                            <div class="input-group has-validation">
                                                <input type="text" name="email" class="form-control" id="email" placeholder="Enter your email"
                                                    required>
                                                <div class="invalid-feedback">Please enter your email.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password"
                                                required>
                                            <div class="invalid-feedback">Please enter your password.</div>
                                        </div>

                                        {{-- <div class="col-12">
                                            <div class="d-flex gap-2 justify-content-end">
                                                <a href="{{ route('auth.forgot-password.show') }}">Forgot Password ?</a>
                                            </div>
                                        </div> --}}
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Login</button>
                                        </div>
                                        {{-- <div class="col-12">
                                            <p class="small mb-0">Don't have account? <a
                                                    href={{ route('user.register.show') }}>Create
                                                    an account</a></p> --}}
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
    <!-- End main -->
@endsection
