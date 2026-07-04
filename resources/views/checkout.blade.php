@extends('layouts.app')

@section('title', 'Checkout — Ayotanding')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body p-4">
                <div class="text-center mb-4">
                    <i class="bi bi-receipt text-success" style="font-size: 3rem;"></i>
                    <h4 class="mt-2">Checkout</h4>
                    <p class="text-muted small">Lengkapi data dirimu untuk melanjutkan pembayaran</p>
                </div>

                <form action="{{ route('checkout.process') }}" method="post">
                    @csrf
                    <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Nama Lengkap</label>
                        <input type="text" id="full_name" name="full_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Nomor Telepon</label>
                        <input type="text" id="phone_number" name="phone_number" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="alert alert-success bg-opacity-10 d-flex justify-content-between">
                        <span>Total Pembayaran</span>
                        <strong>Rp {{ number_format($totalAmount, 0, ',', '.') }}</strong>
                    </div>
                    <button type="submit" class="btn btn-success w-100 py-2">
                        <i class="bi bi-arrow-right me-1"></i>Lanjut ke Pembayaran
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
