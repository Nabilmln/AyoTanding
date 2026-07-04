@extends('layouts.app')

@section('title', $lapangan->field_name . ' — Ayotanding')

@section('content')
<div class="row g-4">
    <div class="col-lg-7">
        <div class="card border-0 overflow-hidden">
            <img src="{{ asset('storage/field_photos/' . $lapangan->field_photo) }}" class="card-img-top" alt="{{ $lapangan->field_name }}" style="height: 380px; object-fit: cover;">
            <div class="card-body p-4">
                <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                    <span class="badge px-3 py-2" style="background: var(--primary-soft); color: var(--primary-dark); font-size: .8rem;">
                        <i class="bi bi-tag me-1"></i>{{ $lapangan->jenisLapangan->nama }}
                    </span>
                    <span class="badge px-3 py-2" style="background: #eff6ff; color: #1e40af; font-size: .8rem;">
                        <i class="bi bi-credit-card me-1"></i>{{ $lapangan->layananPembayaran->layanan ?? 'Transfer' }}
                    </span>
                </div>
                <h4 class="fw-bold mb-3">{{ $lapangan->field_name }}</h4>
                <div class="d-flex align-items-center text-muted small mb-2">
                    <i class="bi bi-geo-alt me-2" style="color: var(--primary);"></i>{{ $lapangan->location }}
                </div>
                <div class="d-flex align-items-center text-muted small mb-3">
                    <i class="bi bi-pin-map me-2" style="color: var(--primary);"></i>{{ $lapangan->full_address }}
                </div>
                @if($lapangan->description)
                    <p class="text-muted mb-4">{{ $lapangan->description }}</p>
                @endif
                <div class="row g-2">
                    <div class="col-4">
                        <div class="p-3 rounded-3 text-center" style="background: var(--gray-50);">
                            <small class="text-muted d-block">Mulai</small>
                            <strong>{{ $lapangan->fases->min('jam_mulai') ? \Carbon\Carbon::parse($lapangan->fases->min('jam_mulai'))->format('H:i') : '-' }}</strong>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="p-3 rounded-3 text-center" style="background: var(--gray-50);">
                            <small class="text-muted d-block">Sampai</small>
                            <strong>{{ $lapangan->fases->max('jam_berakhir') ? \Carbon\Carbon::parse($lapangan->fases->max('jam_berakhir'))->format('H:i') : '-' }}</strong>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="p-3 rounded-3 text-center" style="background: var(--primary-soft);">
                            <small class="d-block" style="color: var(--primary-dark);">Mulai dari</small>
                            <strong style="color: var(--primary-dark);">Rp{{ number_format($lapangan->fases->min('harga'), 0, ',', '.') }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-3"><i class="bi bi-calendar-plus me-2" style="color: var(--primary);"></i>Booking Lapangan</h5>
                @if(session('error'))
                    <div class="alert alert-danger py-2 small">{{ session('error') }}</div>
                @endif
                <form method="POST" action="{{ route('booking.add_to_cart', $lapangan->id) }}">
                    @csrf
                    <div class="mb-3">
                        <label for="booking_date" class="form-label small fw-semibold">Tanggal Booking</label>
                        <input type="date" id="booking_date" name="booking_date" class="form-control" required min="{{ now()->format('Y-m-d') }}">
                    </div>
                    <div class="mb-3">
                        <label for="fase_id" class="form-label small fw-semibold">Pilih Sesi Waktu</label>
                        <select id="fase_id" name="fase_id" class="form-select" required>
                            <option value="">— Pilih sesi —</option>
                            @foreach($lapangan->fases as $fase)
                                <option value="{{ $fase->id }}">
                                    {{ \Carbon\Carbon::parse($fase->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($fase->jam_berakhir)->format('H:i') }} (Rp {{ number_format($fase->harga, 0, ',', '.') }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success w-100 py-2 fw-bold">
                        <i class="bi bi-cart-plus me-1"></i>Tambahkan ke Keranjang
                    </button>
                </form>
            </div>
        </div>

        <div class="card border-0 mt-3" style="background: var(--primary-soft);">
            <div class="card-body p-3">
                <div class="d-flex align-items-center">
                    <i class="bi bi-info-circle me-2 fs-5" style="color: var(--primary);"></i>
                    <small style="color: var(--primary-dark);">Setelah booking, kamu bisa lanjut ke pembayaran dari halaman keranjang.</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
