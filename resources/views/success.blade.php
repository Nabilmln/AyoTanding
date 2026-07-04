@extends('layouts.app')

@section('title', 'Pembayaran Berhasil — Ayotanding')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="card border-0 shadow-sm text-center">
            <div class="card-body py-5 px-4">
                <div class="mx-auto d-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px; background: var(--primary-soft); border-radius: 50%;">
                    <i class="bi bi-check-circle fs-1" style="color: var(--primary);"></i>
                </div>
                <h4 class="fw-bold mb-2">Pembayaran Berhasil!</h4>
                <p class="text-muted small mb-4">Terima kasih, pembayaran kamu telah berhasil diproses.</p>
                <div class="d-flex justify-content-center gap-2">
                    <a href="{{ route('tiket') }}" class="btn btn-success px-4"><i class="bi bi-ticket me-1"></i>Lihat Tiket</a>
                    <a href="{{ route('main') }}" class="btn btn-outline-success px-4"><i class="bi bi-house me-1"></i>Beranda</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
