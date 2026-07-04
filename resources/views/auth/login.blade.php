@extends('layouts.app')

@section('title', 'Login — Ayotanding')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <div class="text-center mb-4">
                    <i class="bi bi-shield-lock text-success" style="font-size: 3rem;"></i>
                    <h4 class="mt-2">Login</h4>
                    <p class="text-muted small">Masuk ke akun Ayotanding-mu</p>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success w-100 py-2">
                        <i class="bi bi-box-arrow-in-right me-1"></i>Login
                    </button>
                </form>
                <div class="text-center mt-3">
                    <a href="{{ route('register') }}" class="text-success text-decoration-none small">Belum punya akun? Register</a>
                </div>
                <div class="text-center mt-1">
                    <a href="{{ route('welcome') }}" class="text-muted text-decoration-none small">Kembali ke halaman utama</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
