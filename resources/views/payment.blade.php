@extends('layouts.app')

@section('title', 'Pembayaran — Ayotanding')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4 p-lg-5">
                <div class="text-center mb-4">
                    <div class="mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 64px; height: 64px; background: var(--primary-soft); border-radius: 16px;">
                        <i class="bi bi-credit-card fs-2" style="color: var(--primary);"></i>
                    </div>
                    <h5 class="fw-bold mb-1">Pembayaran</h5>
                    <p class="text-muted small mb-0">Transfer ke rekening tujuan lalu upload bukti</p>
                </div>

                <div class="rounded-3 p-3 mb-3 d-flex justify-content-between align-items-center" style="background: var(--primary-soft);">
                    <span class="fw-semibold small" style="color: var(--primary-dark);">Total</span>
                    <strong class="fs-5" style="color: var(--primary-dark);">Rp{{ number_format($totalAmount, 0, ',', '.') }}</strong>
                </div>

                <div class="rounded-3 p-3 mb-3 text-center border" style="background: var(--gray-50);">
                    <small class="text-muted d-block mb-1">Bayar ke</small>
                    <p class="fw-bold fs-5 mb-0" style="color: var(--primary);">{{ $paymentOption }}</p>
                </div>

                <div class="rounded-3 p-3 mb-4 d-flex align-items-center" style="background: #fffbeb;">
                    <i class="bi bi-clock me-2 fs-5" style="color: #92400e;"></i>
                    <div>
                        <small class="d-block" style="color: #92400e;">Sisa waktu pembayaran</small>
                        <strong id="countdown" class="fs-4" style="color: #92400e;">10:00</strong>
                    </div>
                </div>

                <form action="{{ route('payment.process') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="bukti_pembayaran" class="form-label small fw-semibold">Upload Bukti Pembayaran</label>
                        <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" class="form-control" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100 py-2 fw-bold">
                        <i class="bi bi-check-lg me-1"></i>Konfirmasi Pembayaran
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    var countDownDate = new Date().getTime() + 600000;
    var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate - now;
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        document.getElementById("countdown").innerHTML = String(minutes).padStart(2, '0') + ":" + String(seconds).padStart(2, '0');
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "Waktu habis";
        }
    }, 1000);
</script>
@endpush
