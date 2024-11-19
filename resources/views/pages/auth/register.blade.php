@extends('layouts.guest')

@section('title', 'Register')

@section('content')
    <link rel="stylesheet" href="{{ url('/assets/css/register.css') }}">

    <main class="auth"
        style="background-image: url('{{ url('/assets/img/background-image-2.jpg') }}'); background-size: cover; background-position: center; min-height: 100vh;">
        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="card mb-3 shadow-lg">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center">
                                        <a href="index.html" class="logo d-flex align-items-center w-auto">
                                            <img src={{ url('/assets/img/event-tech-logo.png') }} alt="">
                                        </a>
                                    </div>

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Create Your Account</h5>
                                        <p class="text-center small mb-5">Enter your details to create an account</p>
                                    </div>
                                    <form class="row g-3 needs-validation" method="POST"
                                        action="{{ route('auth.register.post') }}" novalidate>
                                        @csrf

                                        <div class="col-12">
                                            <label for="name" class="form-label">Full Name:</label>
                                            <div class="input-group has-validation">
                                                <input type="text" name="name" class="form-control" id="name"
                                                    placeholder="Enter your full name" required>
                                                <div class="invalid-feedback">Please enter your full name.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="email" class="form-label">E-Mail:</label>
                                            <div class="input-group has-validation">
                                                <input type="email" name="email" class="form-control" id="email"
                                                    placeholder="Enter your email" required>
                                                <div class="invalid-feedback">Please enter your email.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="password" class="form-label">Password:</label>
                                            <div class="input-group has-validation">
                                                <input type="password" name="password" class="form-control" id="password"
                                                    placeholder="Enter your password" required>
                                                <div class="invalid-feedback">Please enter your password.</div>
                                                <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                                    <i class="bi bi-eye-slash" id="eyeIcon"></i>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-4 d-flex justify-content-center">
                                            <button class="btn btn-primary" type="submit">Register</button>
                                        </div>

                                        <div class="col-12">
                                            <p class="small mt-5 mb-0">Already have an account? <a
                                                    href="{{ route('auth.login.show') }}">Login here</a></p>
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
@endsection

@section('script')
    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const passwordField = document.querySelector("#password");
        const eyeIcon = document.querySelector("#eyeIcon");

        togglePassword.addEventListener("click", function() {
            const type = passwordField.type === "password" ? "text" : "password";
            passwordField.type = type;

            if (passwordField.type === "password") {
                eyeIcon.classList.add("bi-eye-slash");
                eyeIcon.classList.remove("bi-eye");
            } else {
                eyeIcon.classList.add("bi-eye");
                eyeIcon.classList.remove("bi-eye-slash");
            }
        });
    </script>
@endsection
