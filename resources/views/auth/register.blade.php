@extends('layouts.app')

@section('title', 'Register — Ayotanding')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <div class="text-center mb-4">
                    <i class="bi bi-person-plus text-success" style="font-size: 3rem;"></i>
                    <h4 class="mt-2">Buat Akun Baru</h4>
                    <p class="text-muted small">Daftar untuk mulai menyewa lapangan</p>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success w-100 py-2">
                        <i class="bi bi-person-check me-1"></i>Register
                    </button>
                </form>
                <div class="text-center mt-3">
                    <a href="{{ route('login') }}" class="text-success text-decoration-none small">Sudah punya akun? Login</a>
                </div>
                <div class="text-center mt-1">
                    <a href="{{ route('welcome') }}" class="text-muted text-decoration-none small">Kembali ke halaman utama</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
