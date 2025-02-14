@extends('layouts.app')

@section('content')
<style>
    .card {
        background-color: rgba(255, 255, 255, 0.8); 
        border-radius: 10px; 
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 125px;
    }

    .card-header {
        background-color: rgb(136, 109, 72); 
        color: white;
        border-radius: 10px 10px 0 0;
    }

    .card-body {
        padding: 20px; 
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6 d-flex">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                <div class="input-group-append" >
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword" style="font-size:10px; margin-left:5px">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Toggle untuk menampilkan/menyembunyikan password
    document.getElementById("togglePassword").addEventListener("click", function () {
        togglePassword("password");
        toggleEyeIcon("togglePassword");
    });

    // Toggle untuk menampilkan/menyembunyikan konfirmasi password
    document.getElementById("toggleConfirmPassword").addEventListener("click", function () {
        togglePassword("password-confirm");
        toggleEyeIcon("toggleConfirmPassword");
    });

    function togglePassword(inputId) {
        var passwordInput = document.getElementById(inputId);
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }

    function toggleEyeIcon(buttonId) {
        var eyeIcon = document.querySelector("#" + buttonId + " i");
        eyeIcon.classList.toggle("fa-eye-slash");
    }
</script>
@endsection
