@extends('layouts.app')

@section('title', 'Masuk — Ayotanding')

@section('content')
<div class="row justify-content-center" style="margin-top: 3rem;">
    <div class="col-md-5 col-lg-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4 p-lg-5">
                <div class="text-center mb-4">
                    <div class="mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 64px; height: 64px; background: var(--primary-soft); border-radius: 16px;">
                        <i class="bi bi-shield-lock fs-2" style="color: var(--primary);"></i>
                    </div>
                    <h5 class="fw-bold mb-1">Selamat Datang</h5>
                    <p class="text-muted small mb-0">Masuk ke akun Ayotanding-mu</p>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label small fw-semibold">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="nama@email.com" required>
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label small fw-semibold">Password</label>
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;" required>
                        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <button type="submit" class="btn btn-success w-100 py-2 fw-bold">
                        <i class="bi bi-box-arrow-in-right me-1"></i>Masuk
                    </button>
                </form>
                <div class="text-center mt-4">
                    <p class="small mb-0 text-muted">Belum punya akun? <a href="{{ route('register') }}" class="fw-bold" style="color: var(--primary); text-decoration: none;">Daftar</a></p>
                </div>
            </div>
        </div>
        <p class="text-center mt-3 small text-muted">
            <i class="bi bi-arrow-left me-1"></i><a href="{{ route('welcome') }}" class="text-muted" style="text-decoration: none;">Kembali ke beranda</a>
        </p>
    </div>
</div>
@endsection
