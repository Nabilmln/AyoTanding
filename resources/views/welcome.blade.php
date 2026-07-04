@extends('layouts.app')

@section('title', 'Ayotanding — Sewa Lapangan Olahraga')

@section('content')
<div class="hero-section text-center rounded-4 mb-5">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3">Selamat Datang di Ayotanding</h1>
        <p class="lead mb-4">Temukan dan sewa lapangan olahraga favoritmu dengan mudah!</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="{{ route('register') }}" class="btn btn-light btn-lg px-4">
                <i class="bi bi-person-plus me-2"></i>Daftar
            </a>
            <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg px-4">
                <i class="bi bi-box-arrow-in-right me-2"></i>Login
            </a>
        </div>
    </div>
</div>

<div class="row g-4 mb-5">
    <div class="col-md-4">
        <div class="stat-card">
            <i class="bi bi-search"></i>
            <h5 class="mt-2">Cari Lapangan</h5>
            <p class="text-muted mb-0 small">Temukan berbagai lapangan olahraga di sekitarmu</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card">
            <i class="bi bi-calendar-check"></i>
            <h5 class="mt-2">Booking Mudah</h5>
            <p class="text-muted mb-0 small">Pilih jadwal dan booking dalam hitungan detik</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card">
            <i class="bi bi-credit-card"></i>
            <h5 class="mt-2">Bayar Nanti</h5>
            <p class="text-muted mb-0 small">Booking dulu, bayar setelahnya</p>
        </div>
    </div>
</div>

<div class="text-center mb-4">
    <p class="text-muted">Sudah punya akun? <a href="{{ route('login') }}" class="text-success fw-bold">Login di sini</a></p>
</div>
@endsection
