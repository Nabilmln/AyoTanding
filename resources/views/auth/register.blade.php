@extends('layouts.app')

@section('title', 'Daftar — Ayotanding')

@section('content')
<div class="row justify-content-center" style="margin-top: 2rem;">
    <div class="col-md-6 col-lg-5">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4 p-lg-5">
                <div class="text-center mb-4">
                    <div class="mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 64px; height: 64px; background: var(--primary-soft); border-radius: 16px;">
                        <i class="bi bi-person-plus fs-2" style="color: var(--primary);"></i>
                    </div>
                    <h5 class="fw-bold mb-1">Buat Akun Baru</h5>
                    <p class="text-muted small mb-0">Daftar untuk mulai menyewa lapangan</p>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label small fw-semibold">Nama Lengkap</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Nama kamu" required>
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label small fw-semibold">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="nama@email.com" required>
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label small fw-semibold">Password</label>
                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Min. 8 karakter" required>
                            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password_confirmation" class="form-label small fw-semibold">Konfirmasi</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Ulangi password" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success w-100 py-2 fw-bold">
                        <i class="bi bi-person-check me-1"></i>Daftar
                    </button>
                </form>
                <div class="text-center mt-4">
                    <p class="small mb-0 text-muted">Sudah punya akun? <a href="{{ route('login') }}" class="fw-bold" style="color: var(--primary); text-decoration: none;">Masuk</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
