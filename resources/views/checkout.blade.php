@extends('layouts.app')

@section('title', 'Checkout — Ayotanding')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4 p-lg-5">
                <div class="text-center mb-4">
                    <div class="mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 64px; height: 64px; background: var(--primary-soft); border-radius: 16px;">
                        <i class="bi bi-receipt fs-2" style="color: var(--primary);"></i>
                    </div>
                    <h5 class="fw-bold mb-1">Checkout</h5>
                    <p class="text-muted small mb-0">Lengkapi data dirimu untuk melanjutkan</p>
                </div>
                <form action="{{ route('checkout.process') }}" method="post">
                    @csrf
                    <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                    <div class="mb-3">
                        <label for="full_name" class="form-label small fw-semibold">Nama Lengkap</label>
                        <input type="text" id="full_name" name="full_name" class="form-control" placeholder="Nama sesuai KTP" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label small fw-semibold">Nomor Telepon</label>
                        <input type="text" id="phone_number" name="phone_number" class="form-control" placeholder="0812-3456-7890" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label small fw-semibold">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="nama@email.com" required>
                    </div>
                    <div class="rounded-3 p-3 mb-4 d-flex justify-content-between align-items-center" style="background: var(--primary-soft);">
                        <span class="fw-semibold small" style="color: var(--primary-dark);">Total Pembayaran</span>
                        <strong class="fs-5" style="color: var(--primary-dark);">Rp{{ number_format($totalAmount, 0, ',', '.') }}</strong>
                    </div>
                    <button type="submit" class="btn btn-success w-100 py-2 fw-bold">
                        <i class="bi bi-arrow-right me-1"></i>Lanjut ke Pembayaran
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
