@extends('layouts.app')

@section('title', 'Pembayaran — Ayotanding')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body p-4">
                <div class="text-center mb-4">
                    <i class="bi bi-credit-card text-success" style="font-size: 3rem;"></i>
                    <h4 class="mt-2">Pembayaran</h4>
                </div>

                <div class="alert alert-info">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-bold">Total Pembayaran</span>
                        <span class="fs-5 fw-bold text-success">Rp {{ number_format($totalAmount, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="card bg-light border-0 mb-3">
                    <div class="card-body text-center">
                        <small class="text-muted">Bayar ke</small>
                        <p class="fw-bold mb-0 fs-5">{{ $paymentOption }}</p>
                    </div>
                </div>

                <div class="alert alert-warning text-center">
                    <i class="bi bi-clock me-1"></i>
                    Anda memiliki waktu <strong>10 menit</strong> untuk melakukan pembayaran.
                    <div id="countdown" class="fs-4 fw-bold mt-2 text-danger"></div>
                </div>

                <form action="{{ route('payment.process') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="bukti_pembayaran" class="form-label">Upload Bukti Pembayaran</label>
                        <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" class="form-control" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100 py-2">
                        <i class="bi bi-check-lg me-1"></i>Sudah Bayar
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
