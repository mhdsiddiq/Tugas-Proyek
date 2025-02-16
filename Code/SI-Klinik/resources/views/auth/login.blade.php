@extends('layouts.auth')

@section('title', 'Login')


<div class="login-box">
    <a href="index3.html" class="brand-link bg-gradient-light">
        <p class="brand-text font-weight-light"
            style="font-size: 2rem; margin: 0 auto; text-align: center; width: max-content;">SI-Klinik</p>
    </a>
    {{-- <div class="login-logo">
        <a href="../../index2.html"><b>Halaman</b>Login</a>
    </div> --}}
    <!-- /.login-logo -->
    <div class="card">
        @if (session()->has('success'))
            <div class="alert alert-success alert dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('loginError'))
            <div class="alert alert-danger alert dismissible fade show" role="alert">
                {{ session('loginError') }}
            </div>
        @endif
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form action="/login" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        id="email" placeholder="Email" autofocus required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" id="password "placeholder="Password"
                        required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    
                </div> --}}
                <div class="col-mb-3">
                    <button type="submit" class="btn btn-primary btn-block">Log In
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <style>
                                .login {
                                    animation: login-right 1s cubic-bezier(1, -0.17, 0.29, 0.99) infinite alternate both;
                                }

                                @keyframes login-right {
                                    0% {
                                        transform: translateX(0);
                                    }

                                    100% {
                                        transform: translateX(2px);
                                    }
                                }
                            </style>
                            <path stroke="#0A0A30" stroke-linecap="round" stroke-width="1.5"
                                d="M9.083 14.508V17a2.5 2.5 0 002.5 2.5h5a2.5 2.5 0 002.5-2.5V7a2.5 2.5 0 00-2.5-2.5h-5a2.5 2.5 0 00-2.5 2.5v2.563"
                                fill="currentColor" />
                            <path class="login" fill="#265BFF"
                                d="M4.917 11.25a.75.75 0 000 1.5v-1.5zm8.66 1.5a.75.75 0 000-1.5v1.5zm-2.552 1.216a.75.75 0 001.054 1.068l-1.054-1.068zM14.083 12l.527.534a.75.75 0 000-1.068l-.527.534zM12.08 8.966a.75.75 0 00-1.054 1.068l1.054-1.068zM4.917 12.75h8.66v-1.5h-8.66v1.5zm7.162 2.284l2.531-2.5-1.054-1.068-2.53 2.5 1.053 1.068zm2.531-3.568l-2.53-2.5-1.055 1.068 2.531 2.5 1.054-1.068z"
                                fill="currentColor" />
                        </svg> --}}
                    </button>
                </div>
            </form>

            {{-- <p class="mb-1">
                <a href="forgot-password.html">I forgot my password</a>
            </p> --}}

        </div>
        <!-- /.login-card-body -->
    </div>
</div>
