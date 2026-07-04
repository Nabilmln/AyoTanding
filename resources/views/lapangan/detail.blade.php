@extends('layouts.app')

@section('title', $lapangan->field_name . ' — Ayotanding')

@section('content')
<div class="row g-4">
    <div class="col-lg-7">
        <div class="card">
            <img src="{{ asset('storage/' . $lapangan->field_photo) }}" class="card-img-top" alt="{{ $lapangan->field_name }}" style="height: 350px; object-fit: cover;">
            <div class="card-body">
                <h4 class="card-title">{{ $lapangan->field_name }}</h4>
                <div class="d-flex flex-wrap gap-2 mb-3">
                    <span class="badge bg-success bg-opacity-10 text-success">{{ $lapangan->jenisLapangan->nama }}</span>
                    <span class="badge bg-info bg-opacity-10 text-info">{{ $lapangan->layananPembayaran->layanan ?? 'Transfer' }}</span>
                </div>
                <p class="card-text"><i class="bi bi-geo-alt text-success me-1"></i>{{ $lapangan->location }}</p>
                <p class="card-text"><i class="bi bi-pin-map text-success me-1"></i>{{ $lapangan->full_address }}</p>
                @if($lapangan->description)
                    <p class="card-text text-muted">{{ $lapangan->description }}</p>
                @endif
                <div class="row text-center g-2 mt-3">
                    <div class="col-4">
                        <div class="border rounded-3 p-2">
                            <small class="text-muted d-block">Mulai</small>
                            <strong>{{ $lapangan->fases->min('jam_mulai') ? \Carbon\Carbon::parse($lapangan->fases->min('jam_mulai'))->format('H:i') : '-' }}</strong>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="border rounded-3 p-2">
                            <small class="text-muted d-block">Sampai</small>
                            <strong>{{ $lapangan->fases->max('jam_berakhir') ? \Carbon\Carbon::parse($lapangan->fases->max('jam_berakhir'))->format('H:i') : '-' }}</strong>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="border rounded-3 p-2">
                            <small class="text-muted d-block">Harga</small>
                            <strong>Rp{{ number_format($lapangan->fases->min('harga'), 0, ',', '.') }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3"><i class="bi bi-calendar-plus text-success me-1"></i>Booking Lapangan</h5>

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form method="POST" action="{{ route('booking.add_to_cart', $lapangan->id) }}">
                    @csrf
                    <div class="mb-3">
                        <label for="booking_date" class="form-label">Tanggal Booking</label>
                        <input type="date" id="booking_date" name="booking_date" class="form-control" required min="{{ now()->format('Y-m-d') }}">
                    </div>
                    <div class="mb-3">
                        <label for="fase_id" class="form-label">Pilih Sesi Waktu</label>
                        <select id="fase_id" name="fase_id" class="form-select" required>
                            <option value="">— Pilih sesi —</option>
                            @foreach($lapangan->fases as $fase)
                                <option value="{{ $fase->id }}">
                                    {{ \Carbon\Carbon::parse($fase->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($fase->jam_berakhir)->format('H:i') }} (Rp {{ number_format($fase->harga, 0, ',', '.') }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success w-100 py-2">
                        <i class="bi bi-cart-plus me-1"></i>Tambahkan ke Keranjang
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
