@extends('layouts.app')

@section('title', 'Keranjang — Ayotanding')

@section('content')
<h4 class="mb-4"><i class="bi bi-cart text-success me-2"></i>Keranjang Booking</h4>

@if($bookings->isEmpty())
    <div class="text-center py-5">
        <i class="bi bi-cart-x text-muted" style="font-size: 4rem;"></i>
        <p class="text-muted mt-3">Keranjang Anda kosong.</p>
        <a href="{{ route('main') }}" class="btn btn-success"><i class="bi bi-grid me-1"></i>Cari Lapangan</a>
    </div>
@else
    <div class="row g-4">
        @foreach($bookings as $booking)
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title mb-0">{{ $booking->lapangan->field_name }}</h5>
                            <span class="badge bg-success">Rp{{ number_format($booking->total_price, 0, ',', '.') }}</span>
                        </div>
                        <p class="text-muted small mb-1">
                            <i class="bi bi-geo-alt me-1"></i>{{ $booking->lapangan->location }}
                        </p>
                        <p class="text-muted small mb-1">
                            <i class="bi bi-tag me-1"></i>{{ $booking->lapangan->jenisLapangan->nama }}
                        </p>
                        <p class="text-muted small mb-1">
                            <i class="bi bi-clock me-1"></i>{{ \Carbon\Carbon::parse($booking->fase->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($booking->fase->jam_berakhir)->format('H:i') }}
                        </p>
                        <p class="text-muted small mb-3">
                            <i class="bi bi-calendar me-1"></i>{{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}
                        </p>
                        <div class="d-flex gap-2">
                            <form action="{{ route('checkout', ['bookingId' => $booking->id]) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-credit-card me-1"></i>Bayar
                                </button>
                            </form>
                            <form action="{{ route('keranjang.remove', $booking->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Hapus item ini?')">
                                    <i class="bi bi-trash me-1"></i>Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection
