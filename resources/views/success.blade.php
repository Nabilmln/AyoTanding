@extends('layouts.app')

@section('title', 'Pembayaran Sukses — Ayotanding')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card text-center">
            <div class="card-body py-5">
                <i class="bi bi-check-circle text-success" style="font-size: 5rem;"></i>
                <h3 class="mt-3">Pembayaran Sukses!</h3>
                <p class="text-muted">Terima kasih, pembayaran kamu telah berhasil diproses.</p>
                <a href="{{ route('tiket') }}" class="btn btn-success mt-3">
                    <i class="bi bi-ticket me-1"></i>Lihat Tiket
                </a>
                <a href="{{ route('main') }}" class="btn btn-outline-success mt-3 ms-2">
                    <i class="bi bi-house me-1"></i>Ke Halaman Utama
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
