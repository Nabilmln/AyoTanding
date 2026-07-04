@extends('layouts.app')

@section('title', 'Ayotanding — Sewa Lapangan Olahraga')

@section('content')
<div class="position-relative overflow-hidden mb-5" style="background: linear-gradient(135deg, #059669 0%, #047857 40%, #065f46 100%); border-radius: 20px;">
    <div class="position-absolute top-0 end-0 opacity-10 d-none d-md-block">
        <i class="bi bi-trophy" style="font-size: 20rem; transform: rotate(15deg);"></i>
    </div>
    <div class="row align-items-center p-4 p-md-5" style="min-height: 420px;">
        <div class="col-lg-7 position-relative">
            <span class="badge bg-white bg-opacity-20 text-white mb-3 px-3 py-2" style="background: rgba(255,255,255,.15);">
                <i class="bi bi-lightning-fill me-1"></i> Platform Sewa Lapangan No. 1
            </span>
            <h1 class="display-4 fw-bold text-white mb-3 lh-1">Sewa Lapangan<br>Olahraga <span style="color: #fcd34d;">Mudah & Cepat</span></h1>
            <p class="lead text-white text-opacity-75 mb-4" style="max-width: 520px; color: rgba(255,255,255,.8);">
                Temukan, booking, dan bayar lapangan olahraga favoritmu dalam hitungan menit. Dari futsal hingga basket, semua ada di sini.
            </p>
            <div class="d-flex flex-wrap gap-3">
                <a href="{{ route('register') }}" class="btn btn-light btn-lg px-4 py-3 fw-bold" style="border-radius: 12px;">
                    <i class="bi bi-person-plus me-2"></i>Mulai Sekarang
                </a>
                <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg px-4 py-3 fw-bold" style="border-radius: 12px;">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Masuk
                </a>
            </div>
        </div>
        <div class="col-lg-5 d-none d-lg-block position-relative text-center">
            <div style="background: rgba(255,255,255,.1); border-radius: 20px; padding: 2rem; backdrop-filter: blur(10px);">
                <i class="bi bi-trophy-fill text-white" style="font-size: 6rem; opacity: .8;"></i>
                <p class="text-white mt-3 mb-0 fw-semibold">#AyotandingAja</p>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-5">
    <div class="col-md-4">
        <div class="card border-0 h-100 text-center p-4">
            <div class="mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 56px; height: 56px; background: var(--primary-soft); border-radius: 14px;">
                <i class="bi bi-search fs-3" style="color: var(--primary);"></i>
            </div>
            <h5 class="fw-bold">Cari Lapangan</h5>
            <p class="text-muted small mb-0">Jelajahi berbagai lapangan olahraga di kotamu dengan mudah</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 h-100 text-center p-4">
            <div class="mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 56px; height: 56px; background: var(--primary-soft); border-radius: 14px;">
                <i class="bi bi-calendar-check fs-3" style="color: var(--primary);"></i>
            </div>
            <h5 class="fw-bold">Booking Instan</h5>
            <p class="text-muted small mb-0">Pilih tanggal dan sesi, booking dalam hitungan detik</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 h-100 text-center p-4">
            <div class="mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 56px; height: 56px; background: var(--primary-soft); border-radius: 14px;">
                <i class="bi bi-shield-check fs-3" style="color: var(--primary);"></i>
            </div>
            <h5 class="fw-bold">Bayar Aman</h5>
            <p class="text-muted small mb-0">Transfer ke rekening pemilik, upload bukti bayar</p>
        </div>
    </div>
</div>
@endsection
