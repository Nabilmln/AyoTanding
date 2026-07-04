@extends('layouts.app')

@section('title', 'Keranjang — Ayotanding')

@section('content')
<h4 class="fw-bold mb-1"><i class="bi bi-cart me-2" style="color: var(--primary);"></i>Keranjang Booking</h4>
<p class="text-muted small mb-4">Item yang siap kamu bayar</p>

@if($bookings->isEmpty())
    <div class="text-center py-5">
        <div class="mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background: var(--gray-100); border-radius: 20px;">
            <i class="bi bi-cart-x fs-1 text-muted"></i>
        </div>
        <h5 class="fw-bold text-muted">Keranjang Kosong</h5>
        <p class="text-muted small mb-3">Belum ada lapangan di keranjangmu.</p>
        <a href="{{ route('main') }}" class="btn btn-success px-4"><i class="bi bi-grid me-1"></i>Cari Lapangan</a>
    </div>
@else
    <div class="row g-4">
        @foreach($bookings as $booking)
            <div class="col-lg-6">
                <div class="card border-0 h-100">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h5 class="card-title fw-bold mb-1">{{ $booking->lapangan->field_name }}</h5>
                                <span class="badge px-2 py-1" style="background: var(--primary-soft); color: var(--primary-dark); font-size: .75rem;">
                                    {{ $booking->lapangan->jenisLapangan->nama }}
                                </span>
                            </div>
                            <span class="fw-bold fs-5" style="color: var(--primary);">Rp{{ number_format($booking->total_price, 0, ',', '.') }}</span>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex align-items-center text-muted small mb-1">
                                <i class="bi bi-geo-alt me-2" style="color: var(--primary);"></i>{{ $booking->lapangan->location }}
                            </div>
                            <div class="d-flex align-items-center text-muted small mb-1">
                                <i class="bi bi-calendar me-2" style="color: var(--primary);"></i>{{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}
                            </div>
                            <div class="d-flex align-items-center text-muted small">
                                <i class="bi bi-clock me-2" style="color: var(--primary);"></i>{{ \Carbon\Carbon::parse($booking->fase->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($booking->fase->jam_berakhir)->format('H:i') }}
                            </div>
                        </div>
                        <div class="d-flex gap-2 pt-2 border-top">
                            <form action="{{ route('checkout', ['bookingId' => $booking->id]) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success px-3"><i class="bi bi-credit-card me-1"></i>Bayar</button>
                            </form>
                            <form action="{{ route('keranjang.remove', $booking->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger px-3" onclick="return confirm('Hapus item ini?')"><i class="bi bi-trash me-1"></i>Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection
